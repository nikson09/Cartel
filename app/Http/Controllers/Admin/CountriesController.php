<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class CountriesController extends Controller
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

    public function getCountries()
    {
        $attributes = Country::query();
        return Datatables::of($attributes)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin_countries_edit', ['id' => $row->id]) .'"></a>
                    <a class="btn btn-outline-dark fa fa-trash" href="'. route('admin_countries_delete', ['id' => $row->id]) .'" ></a>';
            })
            ->addColumn('image', function ($row) {
                if(empty($row->image)){
                    $fileUrl = 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg';
                } else {
                    $fileUrl = Storage::url('public/countries/'. $row->image);
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
        $pageSlug = 'countries';

        return view('admin.pages.countries.create', ['pageSlug' => $pageSlug]);
    }

    public function createCountry(Request $request)
    {
        $file = $request->file('image');
        $filename = '';
        if(!empty($file)){
//            $filename = $file->getClientOriginalName();
            $filename = (count(Country::all()) + 1) .'.png';
            $file->storeAs('public/countries', $filename);
        }

        $productAttribute = Country::create([
            'name' => $request->name,
            'site_name' => $request->site_name,
            'image' => $filename,
            'status' => $request->status
        ]);

        return redirect()->route('admin_countries');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        $pageSlug = 'countries';

        return view('admin.pages.countries.edit', ['pageSlug' => $pageSlug, 'country' => $country]);
    }

    public function editCountry($id, Request $request)
    {
        $attribute = Country::find($id);

        $attribute->name = $request->name;
        $attribute->site_name = $request->site_name;
        $file = $request->file('image');
        if(!empty($file)){
//            $filename = $file->getClientOriginalName();
            $filename = $attribute->id .'.png';
            $file->storeAs('public/countries', $filename);
            $attribute->image = $filename;
        }
        $attribute->status = $request->status;
        $attribute->update();

        return redirect()->route('admin_countries');
    }

    public function delete($id)
    {
        $attribute = Country::find($id);
        $attribute->delete();

        return redirect()->route('admin_countries');
    }
}
