<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        ],[
            "email.required" => "Поле обязательно для заполнения",
            "email.email" => "Введите правильный адрес",
            "pass.required" => "Поле обязательно для заполнения",
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function register_valid(Request $request)
    {
        $request->validate([
            "email" => "required|unique:user|email",
            "name" => "required",
            "pass" => "required",
            "confirm" => "required|same:password",
        ], [
                "email.required" => "Поле обязательно для заполнения",
                "email.email" => "Введите правильный адрес",
                "email.unicue" => "Данный адрес занят",
                "pass.required" => "Поле обязательно для заполнения",
                "confirm.required" => "Поле обязательно для заполнения",
                "name.required" => "Поле обязательно для заполнения"
            ]
        );
    }

    public function account()
    {
        return view('account');
    }
}
