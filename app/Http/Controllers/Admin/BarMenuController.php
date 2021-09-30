<?php

namespace App\Http\Controllers\Admin;

use App\BarMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BarMenuController extends Controller
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

    public function getBarMenus()
    {
        $barMenus = BarMenu::query();
        return Datatables::of($barMenus)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin_barMenus_edit', ['id' => $row->id]) .'"></a>
                    <a class="btn btn-outline-dark fa fa-trash" href="'. route('admin_barMenus_delete', ['id' => $row->id]) .'" ></a>';
            })
            ->addColumn('image', function ($row) {
                if(empty($row->image)){
                    $fileUrl = 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg';
                } else {
                    $fileUrl = Storage::url('public/bar-menu/'. $row->image);
                }
                return '<div class="text-left">
                            <img id="preview" src="'. $fileUrl .'" style="max-width: 200px" class="rounded" alt="...">
                        </div>';
            })
            ->addColumn('href', function ($row) {
                return '<a href="'. $row->href .'">Открыть ссылку</a>';
            })
            ->rawColumns(['action', 'image', 'href'])
            ->make(true);
    }

    public function create()
    {
        $pageSlug = 'bar-menu';
        return view('admin.pages.barMenus.create', ['pageSlug' => $pageSlug]);
    }

    public function createBarMenu(Request $request)
    {
        $barMenu = BarMenu::create([
            'name' => $request->name,
            'href' => $request->href,
            'image' => '',
            'active' => $request->active
        ]);

        $file = $request->file('image');
        $filename = '';
        if(!empty($file)){
            $filename = ($barMenu->id) .'.png';
            $file->storeAs('public/bar-menu', $filename);
            $barMenu->image = $filename;
            $barMenu->update();
        }

        return redirect()->route('admin_barMenus');
    }

    public function edit($id)
    {
        $barMenu = BarMenu::find($id);
        $pageSlug = 'bar-menu';

        return view('admin.pages.barMenus.edit', ['pageSlug' => $pageSlug, 'barMenu' => $barMenu]);
    }

    public function editBarMenu($id, Request $request)
    {
        $barMenu = BarMenu::find($id);

        $barMenu->name = $request->name;
        $barMenu->href = $request->href;
        $file = $request->file('image');
        if(!empty($file)){
//            $filename = $file->getClientOriginalName();
            $filename = $barMenu->id .'.png';
            $file->storeAs('public/bar-menu', $filename);
            $barMenu->image = $filename;
        }
        $barMenu->active = $request->active;
        $barMenu->update();

        return redirect()->route('admin_barMenus');
    }

    public function delete($id)
    {
        $barMenu = BarMenu::find($id);
        $barMenu->delete();

        return redirect()->route('admin_barMenus');
    }
}
