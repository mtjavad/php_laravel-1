<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Events\UserNotify;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Helper\Helper;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BooksController extends Controller
{
    public function create()
    {
        $authors=Author::all();
        $categories=Category::all();
        return view('create',compact('authors','categories'));
    }

    public function store(BookRequest $request)
    {
        $user=Auth::user();
        $book=$user->books()->create($request->except('_token','authors','categories'));
        $book->authors()->attach($request->input('authors'));
        $book->categories()->attach($request->input('categories'));
        $msg=" کتاب $book->name با موفقیت ثبت گردید";
        event(new UserNotify($user,$msg));
//        Helper::store($request,$user);
        return redirect()->route('book.index')->with('createmsg','کتاب مورد نظر با موفقیت ثبت گردید');
    }

    public function index()
    {
        $books=Book::all();
//        $books=Helper::index();
        return view('index', compact('books'));
    }

    public function show($id)
    {
        $book=Book::findOrFail($id);
//        $book=Helper::show($id);
        $user=$book->user;
        return view('show', compact('book','user'));
    }

    public function edit($id)
    {
        $book=Book::with(['authors','categories'])->findOrFail($id);
        $this->authorize('update',$book);
//        abort_if($book->user->id!=Auth::user()->id,HttpResponse::HTTP_FORBIDDEN);
        $user=$book->user->name;
        $authors=Author::all();
        $categories=Category::all();
        return view('update', compact('book','user','authors','categories'));
    }

    public function update($id, BookRequest $request)
    {
        $book=Book::findOrFail($id);
        $book->update($request->except('_token','_method','authors','categories'));
        $book->authors()->sync($request->input('authors'));
        $book->categories()->sync($request->input('categories'));
//        Helper::update($id, $request);
        return redirect()->route('book.index')->with('createmsg','کتاب مورد نظر با موفقیت آپدیت گردید');
    }
}
