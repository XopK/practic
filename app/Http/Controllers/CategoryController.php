<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create_category(Request $request)
    {
        $request->validate(
            [
                'title_cat' => 'required|max:100',
            ],
            [
                'title_cat.required' => 'Поле название категории не заполнено!',
                'title_cat.max' => 'Название категории должно быть не более 100 символов!',
            ],
        );

        $create_category = $request->all();

        Category::create([
            'title' => $create_category['title_cat'],
        ]);

        return redirect('/admin');
    }

    public function show($id)
    {
        $category = Category::find($id);
        $posts = $category->posts;
        return view('categories', ['cate'=>$category, 'courses' => $posts]);
    }
}
