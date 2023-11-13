<?php

namespace App\Http\Controllers;

use App\Models\Course;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(4);
        return view("index", ["courses" => $courses]);
    }

    public function create(Request $request)
    {
        $request->validate([
            "title" => "required|max:200",
            "cost" => "required|numeric",
            "duration" => "required|numeric",
            "description" => "required",
            "image" => "required",

        ], [
            "title.required" => "Поле название курса не заполнено!",
            "title.max" => "Название курса должно быть не более 200 символов!",
            "cost.required" => "Поле стоимость курса не заполнено!",
            "cost.numeric" => "Введите числовое значение!",
            "duration.numeric" => "Введите числовое значение!",
            "duration.required" => "Поле длительность курса не заполнено!",
            "description.required" => "Поле описание курса не заполнено!",
            "image.required" => "Выберите фото!",
        ]);

        $create_course = $request->all();

        $file = $request->file("image");

        $file_name = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

        Storage::putFileAs('public/img', $file, $file_name);

        Course::create([
            "title" => $create_course['title'],
            "category_id" => $create_course['category'],
            "cost" => $create_course['cost'],
            "duration" => $create_course['duration'],
            "description" => $create_course['description'],
            "image" => $file_name,
        ]);

        // if ($request->hasFile('image')) {
        //     // $path = $request->file('image')->store('img');
        //     $path = Storage::putFile('img', $request->file('image'));
        //     return $path;
        // }

        return redirect("/admin")->with([
            "succes" => "Курс успешно добавлен"
        ]);
    }
}
