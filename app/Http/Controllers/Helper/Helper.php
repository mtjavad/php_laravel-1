<?php
/**
 * Created by PhpStorm.
 * User: M.Javad
 * Date: 8/25/2019
 * Time: 7:51 AM
 */

namespace App\Http\Controllers\Helper;


use App\Book;
use App\Events\UserNotify;
use App\Http\Requests\BookRequest;

class helper
{
    static public function index()
    {
        return Book::all();
    }

    static public function show($id)
    {
        return Book::with('authors','categories')->findOrFail($id);
    }

    static public function store(BookRequest $request,$user)
    {
//        $user=Auth::user();
        $book=$user->books()->create($request->except('_token','authors','categories'));
        $book->authors()->attach($request->input('authors'));
        $book->categories()->attach($request->input('categories'));
        $msg=" کتاب $book->name با موفقیت ثبت گردید";
        event(new UserNotify($user,$msg));
    }

    static public function update($id, BookRequest $request)
    {
        $book=Book::findOrFail($id);
        $book->update($request->except('_token','_method','authors','categories'));
        $book->authors()->sync($request->input('authors'));
        $book->categories()->sync($request->input('categories'));
    }
}