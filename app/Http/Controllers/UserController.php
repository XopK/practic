<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function login_valid(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "pass" => "required"
        ], [
            "email.required" => "Поле обязательно для заполнения",
            "email.email" => "Введите правильный адрес",
            "pass.required" => "Поле обязательно для заполнения",
        ]);

        $user = $request->only("email", "pass");

        if (Auth::attempt([
            "email" => $user['email'],
            "password" => $user['pass']
        ])) {
            return redirect("/")->with("succes", "");
        } else {
            return redirect()->back()->with("error", "Неверный логин или пароль!!!");
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_valid(Request $request)
    {
        $request->validate([
            "email" => "required|unique:users|email",
            "name" => "required",
            "pass" => "required",
            "confirm" => "required|same:pass",
        ], [
                "email.required" => "Поле обязательно для заполнения",
                "email.email" => "Введите правильный адрес",
                "email.unique" => "Данный адрес занят",
                "pass.required" => "Поле обязательно для заполнения",
                "confirm.required" => "Поле обязательно для заполнения",
                "name.required" => "Поле обязательно для заполнения",
                "confirm.same" => "Пароли должны совпадать"
            ]
        );

        $userInfo = $request->all();

        User::create([
            "email" => $userInfo['email'],
            "password" => Hash::make($userInfo['pass']),
            "name" => $userInfo['name'],
        ]);
        return redirect("/login")->with("succes", "");
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();
        return redirect("/");
    }

    public function account()
    {
        return view('account');
    }
}
