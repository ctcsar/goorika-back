<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


    public function postSignin(Request $request)
    {

        if (! Auth::attempt($request->only('email', 'password'), $remember = true))
//        if (! Auth::attempt($request->only('email', 'password'), $request->has('remember')))
        {
//            var_dump($request);
            return  'Неправильный логин или пароль' . Auth::check();
        }



        else {
            return redirect('api/users');
            return 'Вы успешно авторизовались: ' . Auth::check();
//            return $request->session()->all();
        }
    }


    /**
     * Создает нового пользователя, автоматически авторизуя его
     *
     * @param Request $request
     * @return void
     */

    public function postReg(Request $request)
    {
        $user = User::create([
            'email'    => $request->input('email'),
            'name'     => $request->input('name'),
            'password' => bcrypt($request->input('password'))
        ]);


        return $user;
    }
}

