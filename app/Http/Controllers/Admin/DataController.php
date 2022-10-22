<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function datauser()
    {
        $data = User::orderBy('name','asc')->get();

        return datatables()->of($data)
        ->addColumn('action', 'admin.setting.user.action')
        ->addIndexColumn()
        ->addColumn('role', function($data){
            return $data->currentTeam->name;
        })
        ->addColumn('status', function($data){
            if ($data->active == 1) {
                return'<span class="text-success">Active</span>';
            }else {
                return'<span class="text-danger">Inactive</span>';
            }
        })
        ->rawColumns(['action','status'])
        ->toJson();
    }
}
