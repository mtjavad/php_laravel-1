<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('createCategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
        ],
            [
                'name.required'=> 'وارد کردن نام ضروری است',
            ]
        );
//        dd($request->except('_token'));
        if (Category::create($request->except('_token'))){
            return redirect()->route('category.index')->with('createmsg','دسته بندی مورد نظر با موفقیت ثبت گردید');
        }
        return redirect()->route('category.create')->with('createmsgErr','ثبت دسته بندی مورد نظر با خطا مواجه شد. لطفا دوباره سعی کنید');

    }

    public function index()
    {
        $categories=Category::all();
        return view('indexCategory', compact('categories'));
    }

    public function show($id)
    {
        $category=Category::findOrFail($id);
        return view('showCategory', compact('category'));
    }

    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('updateCategory', compact('category'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'name'=> 'required',
        ],
            [
                'name.required'=> 'وارد کردن نام ضروری است',
            ]
        );

        $category=Category::findOrFail($id);
        if ($category->update($request->except('_token'))){
            return redirect()->route('category.index')->with('createmsg','دسته بندی مورد نظر با موفقیت آپدیت گردید');
        }
        return redirect()->route('category.create')->with('createmsgErr','آپدیت دسته بندی مورد نظر با خطا مواجه شد. لطفا دوباره سعی کنید');

    }
}
