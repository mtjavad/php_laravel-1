<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AuthorsController extends Controller
{
    public function create()
    {
        return view('createAuthor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'birthdate'=> 'required|date'
        ],
            [
                'name.required'=> 'وارد کردن نام ضروری است',
                'birthdate.required'=> 'وارد کردن زمان تولد ضروری است',
                'birthdate.date'=> ' فرمت زمان تولد، تاریخ است',
                ]
        );
//        dd($request->except('_token'));
        if (Author::create($request->except('_token'))){
            return redirect()->route('author.index')->with('createmsg','نویسنده مورد نظر با موفقیت ثبت گردید');
        }
        return redirect()->route('author.create')->with('createmsgErr','ثبت نویسنده مورد نظر با خطا مواجه شد. لطفا دوباره سعی کنید');

    }

    public function index()
    {
        $authors=Author::all();
        return view('indexAuthor', compact('authors'));
    }

    public function show($id)
    {
        $author=Author::findOrFail($id);
        return view('showAuthor', compact('author'));
    }

    public function edit($id)
    {
        $author=Author::findOrFail($id);
        return view('updateAuthor', compact('author'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'birthdate'=> 'required|date'
        ],
            [
                'name.required'=> 'وارد کردن نام ضروری است',
                'birthdate.required'=> 'وارد کردن زمان تولد ضروری است',
                'birthdate.date'=> ' فرمت زمان تولد، تاریخ است',
            ]
        );

        $author=Author::findOrFail($id);
        if ($author->update($request->except('_token'))){
            return redirect()->route('author.index')->with('createmsg','نویسنده مورد نظر با موفقیت آپدیت گردید');
        }
        return redirect()->route('author.create')->with('createmsgErr','آپدیت نویسنده مورد نظر با خطا مواجه شد. لطفا دوباره سعی کنید');

    }
}
