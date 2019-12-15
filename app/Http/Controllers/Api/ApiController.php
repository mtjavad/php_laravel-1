<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Category;
use App\Exceptions\MyException;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookCollection;
use App\User;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Book as BookResource;
use App\Http\Controllers\Helper\Helper;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function index()
    {
//        $books=Book::paginate(2);
        $books=Helper::index();
        return response()->json( BookResource::collection($books));
//        return response()->json( $books);
    }

    public function show($id)
    {
        $book = Helper::show($id);
        return response()->json(new BookResource($book));
    }

    public function store(BookRequest $request)
    {
        //Authentication required
        //Input: name, ISBN, pages, price, published_at, authors_id, categories_id
        
        $user=Auth::user();
//        return response()->json($user);
//        $book=$user->books()->create($request->except('authors','categories'));
//        $book->authors()->attach($request->input('authors'));
//        $book->categories()->attach($request->input('categories'));
//        $msg=" کتاب $book->name با موفقیت ثبت گردید";
//        event(new UserNotify($user,$msg));
        Helper::store($request,$user);

        return ['msg'=>'کتاب مورد نظر با موفقیت ثبت گردید'];
    }

    public function update($id, BookRequest $request)
    {
        //Input: name, ISBN, pages, price, published_at, authors_id, categories_id

        $this->authorize('update',Book::findOrFail($id));
//        $book=Book::findOrFail($id);
//        $book->update($request->except('authors','categories'));
//        $book->authors()->sync($request->input('authors'));
//        $book->categories()->sync($request->input('categories'));
        Helper::update($id, $request);
        return ['msg'=>'کتاب مورد نظر با موفقیت آپدیت گردید'];
    }
}
