<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{


    public function postSignin(Request $request)
    {

        if (! Auth::attempt($request->only('email', 'password'), $remember = true))
//        if (! Auth::attempt($request->only('email', 'password'), $request->has('remember')))
        {
//            var_dump($request);
            return  'Неправильный логин или пароль';
        }



        else {
            $token = Str::random(80);
            $request->user()->forceFill([
                'api_token' => hash('sha256', $token),
            ])->save();
            $user = Auth::user();
            $result = ['id' => $user->id, 'email'=> $user->email, 'api_token' => $token, 'name'=> $user->name, 'role'=>$user->role];

            return json_encode($result);
        }
    }


    /**
     * Создает нового пользователя, автоматически авторизуя его
     *
     * @param Request $request
//     * @return void
     */

    public function postReg(Request $request)
    {
        $token = Str::random(80);
        $user = User::forceCreate([
            'email'    => $request->input('email'),
            'name'     => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'api_token' => hash('sha256', $token),
            'role' => 'user'
        ]);

        $result = ['id' => $user->id, 'email'=> $user->email, 'api_token' => $token, 'name'=> $user->name, 'role'=>$user->role];

        return json_encode($result);
    }
}

