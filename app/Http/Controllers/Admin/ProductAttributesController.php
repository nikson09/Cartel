<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\ProductAttribute;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ProductAttributesController extends Controller
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

    public function getAttributes()
    {
        $attributes = Attribute::query();
        return Datatables::of($attributes)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin_product_attributes_edit', ['id' => $row->id]) .'"></a>
                    <a class="btn btn-outline-dark fa fa-trash" href="'. route('admin_product_attributes_delete', ['id' => $row->id]) .'" ></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $pageSlug = 'products';
        return view('admin.pages.product_attributes.create', ['pageSlug' => $pageSlug]);
    }

    public function createAttribute(Request $request)
    {
        $productAttribute = Attribute::create([
            'name' => $request->name,
            'active' => $request->active
        ]);

        return redirect()->route('admin_product_attributes');
    }

    public function edit($id)
    {
        $attribute = Attribute::find($id);
        $pageSlug = 'product_attributes';

        return view('admin.pages.product_attributes.edit', ['pageSlug' => $pageSlug, 'attribute' => $attribute]);
    }

    public function editAttribute($id, Request $request)
    {
        $attribute = Attribute::find($id);

        $attribute->name = $request->name;
        $attribute->active = $request->active;
        $attribute->update();

        return redirect()->route('admin_product_attributes');
    }

    public function delete($id)
    {
        $attribute = Attribute::find($id);
        ProductAttribute::where('attribute_id', $id)->delete();
        $attribute->delete();

        return redirect()->route('admin_product_attributes');
    }
}
