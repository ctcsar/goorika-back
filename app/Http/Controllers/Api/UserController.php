<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = DB::table('user')->get();
//        return $users;
        return csrf_token();
    }

    public function createNewUser(Request $request)
    {
        $user = $request->input();
        return DB::table('user')->insert(['name' => $user['name'], 'email' => $user['email'], 'password' => $user['password']]);
    }

    public function updateUser(Request $request)
    {
        $user = $request->input();
        return DB::table('user')->where('id', $user['id'])->update(['name' => $user['name'], 'email' => $user['email'], 'password' => $user['password']]);
    }

}
