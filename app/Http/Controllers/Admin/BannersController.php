<?php

namespace App\Http\Controllers\Admin;

use App\Baner;
use App\BanerRelation;
use App\Brand;
use App\Category;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BannersController extends Controller
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

    public function getBanners()
    {
        $banners = Baner::query()->with('bannerRelation');
        return Datatables::of($banners)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin_banner_edit', ['id' => $row->id]) .'"></a>
                    <a class="btn btn-outline-dark fa fa-trash" href="'. route('admin_banner_delete', ['id' => $row->id]) .'" ></a>';
            })
            ->addColumn('image', function ($row) {
                if(empty($row->image)){
                    $fileUrl = 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg';
                } else {
                    $fileUrl = Storage::url('public/banners/'. $row->image);
                }
                return '<div class="text-left">
                            <img id="preview" src="'. $fileUrl .'" style="max-width: 200px" class="rounded" alt="...">
                        </div>';
            })
            ->addColumn('category', function ($row) {
                return !empty($row->bannerRelation) ? $row->bannerRelation->category ?? '' : '';
            })
            ->addColumn('type', function ($row) {

                return !empty($row->bannerRelation) ? BanerRelation::BANNER_TYPES[$row->bannerRelation->baner_type] : '';
            })
            ->rawColumns(['action', 'image', 'type'])
            ->make(true);
    }

    public function create()
    {
        $pageSlug = 'banners';
        $bannerTypes = BanerRelation::BANNER_TYPES;
        return view('admin.pages.banner.create', ['pageSlug' => $pageSlug, 'bannerTypes' => $bannerTypes]);
    }

    public function createBanner(Request $request)
    {
        $banerRelated = BanerRelation::create([
            'baner_type' => $request->relation_id,
            'related_id' => $request->related_id
        ]);

        $banner = Baner::create([
            'href' => $request->href,
            'order_line' => $request->order_line,
            'image' => '',
            'relation_id' => $banerRelated->id
        ]);

        $file = $request->file('image');
        $filename = '';
        if(!empty($file)){
            $filename = ($banner->id) .'.png';
            $file->storeAs('public/banners', $filename);
            $banner->image = $filename;
            $banner->update();
        }

        return redirect()->route('admin_banners');
    }

    public function edit($id)
    {
        $banner = Baner::with('bannerRelation')->find($id);
        $pageSlug = 'banners';
        $bannerTypes = BanerRelation::BANNER_TYPES;
        $relations = !empty($banner->bannerRelation) ? $this->fetchBannerRelationsForController($banner->bannerRelation->baner_type) : [];

        return view('admin.pages.banner.edit', [
            'pageSlug' => $pageSlug,
            'banner' => $banner,
            'bannerTypes' => $bannerTypes,
            'relations' => $relations
        ]);
    }

    public function editBanner($id, Request $request)
    {
        $attribute = Baner::find($id);

        $banerRelated = BanerRelation::find($attribute->relation_id);
        $banerRelated->baner_type = isset($request) && !empty($request->all()) &&  !empty($request->relation_id) ? $request->relation_id : $banerRelated->baner_type;
        $banerRelated->related_id =  isset($request) && !empty($request->all()) &&  !empty($request->related_id) ? $request->related_id : $banerRelated->related_id;
        $banerRelated->update();

        $attribute->href = $request->href;
        $attribute->order_line = $request->order_line;
        $file = $request->file('image');
        if(!empty($file)){
//            $filename = $file->getClientOriginalName();
            $filename = $attribute->id .'.png';
            $file->storeAs('public/banners', $filename);
            $attribute->image = $filename;
        }
        $attribute->relation_id = $request->relation_id;
        $attribute->update();

        return redirect()->route('admin_banners');
    }

    public function delete($id)
    {
        $attribute = Baner::find($id);
        $banerRelated = BanerRelation::find($attribute->relation_id);
        $banerRelated->delete();
        $attribute->delete();

        return redirect()->route('admin_banners');
    }

    public function fetchBannerRelations(Request $request)
    {
        $bannerType = $request->banner_type;
        $relations = [];
        switch ($bannerType) {
            case BanerRelation::HOME:
                break;
            case BanerRelation::CATEGORY:
                $categories = Category::where('status', true)->get();
                foreach ($categories as $category){
                    $relations[] = [
                        'key' => $category->id,
                        'value' => $category->name
                    ];
                }
                break;
            case BanerRelation::COUNTRY:
                $countries = Country::where('status', true)->get();
                foreach ($countries as $country){
                    $relations[] = [
                        'key' => $country->id,
                        'value' => $country->name
                    ];
                }
                break;
            case BanerRelation::BRAND:
                $brands = Brand::where('status', true)->get();
                foreach ($brands as $brand){
                    $relations[] = [
                        'key' => $brand->id,
                        'value' => $brand->name
                    ];
                }
                break;
        }

        return response()->json([
            'relations' => $relations
        ], 200);
    }

    public function fetchBannerRelationsForController($bannerType)
    {
        $relations = [];
        switch ($bannerType) {
            case BanerRelation::HOME:
                break;
            case BanerRelation::CATEGORY:
                $categories = Category::where('status', true)->get();
                foreach ($categories as $category){
                    $relations[] = [
                        'key' => $category->id,
                        'value' => $category->name
                    ];
                }
                break;
            case BanerRelation::COUNTRY:
                $countries = Country::where('status', true)->get();
                foreach ($countries as $country){
                    $relations[] = [
                        'key' => $country->id,
                        'value' => $country->name
                    ];
                }
                break;
            case BanerRelation::BRAND:
                $brands = Brand::where('status', true)->get();
                foreach ($brands as $brand){
                    $relations[] = [
                        'key' => $brand->id,
                        'value' => $brand->name
                    ];
                }
                break;
        }

        return $relations;
    }
}
