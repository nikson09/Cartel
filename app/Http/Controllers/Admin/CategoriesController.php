<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        $categories = Category::query();
        return Datatables::of($categories)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin_categories_edit', ['id' => $row->id]) .'"></a>
                    <a class="btn btn-outline-dark fa fa-trash" href="'. route('admin_categories_delete', ['id' => $row->id]) .'" ></a>';
            })
            ->addColumn('parent', function ($row) {
                $category = Category::find($row->parent);
                $categoryName = !empty($category) ? $category->name : 'Без родительской категории';
                return $categoryName;
            })
            ->rawColumns(['action', 'parent'])
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
            'status' => $request->status
        ]);

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
        $category->status = $request->status;

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
