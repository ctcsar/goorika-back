<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RootController extends Controller
{
    public function getUsers(Request $request) {
        $query = DB::table('users');
        if(!empty($request->input('name'))){
           $query = $query->orwhere('name', 'LIKE', "%%{$request->input('name')}%");
        }
        if(!empty($request->input('email'))){
           $query = $query->orwhere('email', 'LIKE', "%%{$request->input('email')}%");
        }
        if(!empty($request->input('role'))){
           $query = $query->orwhere('role', 'LIKE', "%%{$request->input('role')}%");
        }

        $users = $query->select('id','name', 'email', 'role')->get();
        return json_encode($users);
    }

    public function changeRole(Request $request) {
        if(DB::table('users')->where('id', (int)$request->input('id'))->update(['role'=>$request->input('role')])){
            return json_encode(['status'=>'success']);
        } else {
            return json_encode(['status'=>'error']);
        }
    }
}
