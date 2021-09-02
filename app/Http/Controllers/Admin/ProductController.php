<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Brand;
use App\Category;
use App\Country;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
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

    public function getProducts()
    {
        $products = Product::query();
        return Datatables::of($products)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin_product_edit', ['id' => $row->id]) .'"></a>
                    <a class="btn btn-outline-dark fa fa-trash" href="'. route('admin_product_delete', ['id' => $row->id]) .'" ></a>';
            })
            ->addColumn('image', function ($row) {
                if(empty($row->image)){
                    $fileUrl = 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg';
                } else {
                    $fileUrl = Storage::url('public/products/'. $row->image);
                }
                return '<div class="text-left">
                            <img id="preview" src="'. $fileUrl .'" style="max-width: 200px" class="rounded" alt="...">
                        </div>';
            })
            ->addColumn('price', function ($row) {

                return $row->sum . ' грн';
            })
            ->rawColumns(['action', 'image', 'price'])
            ->make(true);
    }

    public function create()
    {
        $pageSlug = 'products';

        $categories = Category::where('status', true)->get();
        $countries = Country::where('status', true)->get();
        $brands = Brand::where('status', true)->get();
        $attributes = Attribute::where('active', true)->get();

        return view('admin.pages.product.create', [
            'pageSlug' => $pageSlug,
            'categories' => $categories,
            'countries' => $countries,
            'brands' => $brands,
            'attributes' => $attributes
        ]);
    }

    public function createProduct(Request $request)
    {
        $file = $request->file('image');
        $filename = '';
        if(!empty($file)){
//            $filename = $file->getClientOriginalName();
            $filename = (count(Product::all()) + 1) .'.png';
            $file->storeAs('public/products', $filename);
        }

        $product = Product::create([
            'name' => $request->name,
            'image' => $filename,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'description' => $request->description ?? '',
            'quantity' => $request->quantity,
            'sum' => $request->price,
            'is_new' => $request->is_new
        ]);

        ProductAttribute::where('product_id', $product->id)->delete();
        if(!empty($request->all()['attributes'])){
            foreach($request->all()['attributes'] as $key =>  $attribute){
                if(!empty($attribute)){
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $key,
                        'value' => $attribute
                    ]);
                }
            }
        }

        return redirect()->route('admin_products');
    }

    public function edit($id)
    {
        $pageSlug = 'products';

        $categories = Category::where('status', true)->get();
        $countries = Country::where('status', true)->get();
        $brands = Brand::where('status', true)->get();
        $attributes = Attribute::where('active', true)->get();
        $product = Product::with('attributes')->where('id', $id)->first();

        return view('admin.pages.product.edit', [
            'pageSlug' => $pageSlug,
            'categories' => $categories,
            'countries' => $countries,
            'brands' => $brands,
            'attributes' => $attributes,
            'product' => $product
        ]);
    }

    public function editProduct($id, Request $request)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $file = $request->file('image');
        if(!empty($file)){
//            $filename = $file->getClientOriginalName();
            $filename = $product->id .'.png';
            $file->storeAs('public/products', $filename);
            $product->image = $filename;
        }
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->country_id = $request->country_id;
        $product->description = $request->description ?? '';
        $product->quantity = $request->quantity;
        $product->sum = $request->price;
        $product->is_new = $request->is_new;
        $product->update();

        ProductAttribute::where('product_id', $product->id)->delete();
        if(!empty($request->all()['attributes'])){
            foreach($request->all()['attributes'] as $key =>  $attribute){
                if(!empty($attribute)){
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $key,
                        'value' => $attribute
                    ]);
                }
            }
        }

        return redirect()->route('admin_products');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin_products');
    }
}
