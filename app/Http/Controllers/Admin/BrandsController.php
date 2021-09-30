<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BrandsController extends Controller
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

    public function getBrands()
    {
        $brands = Brand::query();
        return Datatables::of($brands)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin_brands_edit', ['id' => $row->id]) .'"></a>
                    <a class="btn btn-outline-dark fa fa-trash" href="'. route('admin_brands_delete', ['id' => $row->id]) .'" ></a>';
            })
            ->addColumn('image', function ($row) {
                if(empty($row->image)){
                    $fileUrl = 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg';
                } else {
                    $fileUrl = Storage::url('public/brands/'. $row->image);
                }
                return '<div class="text-left">
                            <img id="preview" src="'. $fileUrl .'" style="max-width: 200px" class="rounded" alt="...">
                        </div>';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function create()
    {
        $pageSlug = 'brands';
        return view('admin.pages.brands.create', ['pageSlug' => $pageSlug]);
    }

    public function createBrand(Request $request)
    {
        $brand = Brand::create([
            'name' => $request->name,
            'site_name' => $request->site_name,
            'image' => '',
            'status' => $request->status
        ]);

        $file = $request->file('image');
        $filename = '';
        if(!empty($file)){
            $filename = ($brand->id) .'.png';
            $file->storeAs('public/brands', $filename);
            $brand->image = $filename;
            $brand->update();
        }

        return redirect()->route('admin_brands');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        $pageSlug = 'brands';

        return view('admin.pages.brands.edit', ['pageSlug' => $pageSlug, 'brand' => $brand]);
    }

    public function editBrand($id, Request $request)
    {
        $attribute = Brand::find($id);

        $attribute->name = $request->name;
        $attribute->site_name = $request->site_name;
        $file = $request->file('image');
        if(!empty($file)){
//            $filename = $file->getClientOriginalName();
            $filename = $attribute->id .'.png';
            $file->storeAs('public/brands', $filename);
            $attribute->image = $filename;
        }
        $attribute->status = $request->status;
        $attribute->update();

        return redirect()->route('admin_brands');
    }

    public function delete($id)
    {
        $attribute = Brand::find($id);
        $attribute->delete();

        return redirect()->route('admin_brands');
    }
}
