<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCategories()
    {
        $categories = Category::query();
        return Datatables::of($categories)
            ->addColumn('image', function ($row) {
                if(empty($row->image)){
                    $fileUrl = 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg';
                } else {
                    $fileUrl = Storage::url('public/categories/'. $row->image);
                }
                return '<div class="text-left">
                            <img id="preview" src="'. $fileUrl .'" style="max-width: 200px" class="rounded" alt="...">
                        </div>';
            })
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin_categories_edit', ['id' => $row->id]) .'"></a>
                    <a class="btn btn-outline-dark fa fa-trash" href="'. route('admin_categories_delete', ['id' => $row->id]) .'" ></a>';
            })
            ->addColumn('parent', function ($row) {
                $category = Category::find($row->parent);
                $categoryName = !empty($category) ? $category->name : 'Без родительской категории';
                return $categoryName;
            })
            ->rawColumns(['action', 'parent', 'image'])
            ->make(true);
    }

    public function create()
    {
        $pageSlug = 'categories';

        $categories = Category::where('status', true)->get();

        return view('admin.pages.categories.create', ['pageSlug' => $pageSlug, 'categories' => $categories]);
    }

    public function createCategory(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'parent' => $request->parent ?? null,
            'sort_order' => $request->sort_order ?? null,
            'is_main' => $request->is_main,
            'status' => $request->status
        ]);

        $file = $request->file('image');
        $filename = '';
        if(!empty($file)){
            $filename = ($category->id) .'.png';
            $file->storeAs('public/categories', $filename);
            $category->image = $filename;
            $category->update();
        }

        return redirect()->route('admin_categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $pageSlug = 'categories';
        $categories = Category::where('status' , true)->where('id' , '!=', $id)->get();

        return view('admin.pages.categories.edit', ['pageSlug' => $pageSlug, 'category' => $category, 'categories' => $categories]);
    }

    public function editCategory($id, Request $request)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->parent = $request->parent;
        $category->sort_order = $request->sort_order;
        $category->is_main = $request->is_main;
        $category->status = $request->status;

        $file = $request->file('image');
        $filename = '';
        if(!empty($file)){
            $filename = ($category->id) .'.png';
            $file->storeAs('public/categories', $filename);
            $category->image = $filename;
        }

        $category->update();

        return redirect()->route('admin_categories');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $categories = Category::where('parent', $category->id)->get();
        foreach($categories as $categoriesDeleted){
            Category::find($categoriesDeleted['id'])->delete();
        }
        $category->delete();

        return redirect()->route('admin_categories');
    }
}
