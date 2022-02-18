<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return Datatables::of($users)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="javascript:void(0); onclick=showUserModal('.$row->id.')">Изменить статусы</a>';
            })
            ->addColumn('is_wholesaler', function ($row) {
                return $row->is_wholesaler ? 'Да' : 'Нет';
            })
            ->addColumn('is_admin', function ($row) {
                return $row->is_admin ? 'Да' : 'Нет';
            })
            ->rawColumns(['action'])

            ->make(true);
    }

    public function getUser(Request $request)
    {
        $user = User::findOrFail($request->id);

        return response()->json([
            'status' => true,
            'user' => $user
        ], 200);
    }

    public function changeUserStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->is_admin = $request->is_admin;
        $user->is_wholesaler = $request->is_wholesaler;
        $user->update();

        return response()->json([
            'status' => true,
            'user' => $user
        ], 200);
    }
}
