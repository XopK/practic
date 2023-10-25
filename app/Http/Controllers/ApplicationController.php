<?php

namespace App\Http\Controllers;

use App\Models\Application;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function new_application(Request $request)
    {
        $request->validate([
            "email"=>"required|email",
            "name"=>"required|max:50",
        ],[
            "email.required"=>"Поле email не заполнено!",
            "email.email"=>"Укажите действительный адрес почты!",
            "name.required"=>"Поле имя не заполнено!",
            "name.max"=>"Имя должно быть не боле 50 символов!",
        ]);

        $application_info = $request->all();

        Application::create([
            "email" => $application_info['email'],
            "name" => $application_info['name'],
            "course_id" => $application_info['course'],
        ]);
        return redirect("/")->with([
            "alert"=>"Заявка успешно создана"
        ]);
    }
    public function confirm($id_application)
    {
        $application = Application::find($id_application);

        $application->is_confirm = 1;

        $application->save();

        return redirect("/admin");
    }
}
