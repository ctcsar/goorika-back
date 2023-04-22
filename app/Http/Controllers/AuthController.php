<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    /**
     * Авторизует пользователя и возвращает токен
     *
     * @param Request $request
     * @return string
     */
    public function signin(Request $request)
    {

        if (! Auth::attempt($request->only('email', 'password')))
        {
//            var_dump($request);
            return  'Неправильный логин или пароль';
        }  else {
            $user = Auth::user();
            $result = ['id' => $user->id, 'email'=> $user->email, 'api_token' => $user->api_token, 'name'=> $user->name, 'role'=>$user->role];

            return json_encode($result);
        }
    }


    /**
     * Создает нового пользователя, автоматически авторизуя его и возвращает токен
     *
     * @param Request $request
     * @return string
     */
    public function registration(Request $request):string
    {
        $user = User::forceCreate([
            'email'    => $request->input('email'),
            'name'     => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'api_token' =>  Str::uuid(),
            'role' => 'user'
        ]);

        $result = ['id' => $user->id, 'email'=> $user->email, 'api_token' => $user->api_token, 'name'=> $user->name, 'role'=>$user->role];

        return json_encode($result);
    }


    /**
     * Разлогинивает пользователя и меняет токен
     *
     * @return string
     */
    public function logout()
    {
        $user = Auth::user();
        $user->api_token = Str::uuid();
        if($user->save()){
            Auth::forgetUser();
            return json_encode(['status'=>'success']);
        } else {
            return json_encode(['status'=>'error']);
        }
    }
}

