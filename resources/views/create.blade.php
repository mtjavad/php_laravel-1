@extends('layout.master')
@section('content')
<div class="card">
<h2 class="card-header">ایجاد کتاب جدید</h2>
    <div class="card-body">
        @include('errors', ['errors' => $errors])
        @if (session('createmsgErr'))
            <div class="alert alert-danger">
                {{session('createmsgErr')}}
            </div>
        @endif
    <form action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">نام</label>
            <input name="name" type="text" id="name" class="form-control" value="{{old('name',isset($book)? $book->name : '')}}">
        </div>
        <div class="form-group">
            <label for="pages">تعداد صفحات</label>
            <input name="pages" type="number" id="pages" class="form-control" value="{{old('pages',isset($book)? $book->pages : '')}}">
        </div>
        <div class="form-group">
            <label for="ISBN">کد ISBN</label>
            <input name="ISBN" type="text" id="ISBN" class="form-control" value="{{old('ISBN',isset($book)? $book->ISBN : '')}}">
        </div>
        <div class="form-group">
            <label for="price">قیمت</label>
            <input name="price" type="number" id="price" class="form-control" value="{{old('price',isset($book)? $book->price : '')}}">
        </div>
        <div class="form-group">
            <label for="published_at">تاریخ انتشار</label>
            <input name="published_at" type="date" id="published_at" class="form-control" value="{{old('published_at',isset($book)? $book->published_at : '')}}">
        </div>
        <div class="form-group">
            <label for="">نام نویسنده ها</label>
            <select name="authors[]" class="form-control" multiple>
                @foreach ($authors as $author)
                    <option value="{{$author->id}}" >{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">دسته بندی ها</label>
            <select name="categories[]" class="form-control" multiple>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group text-center">
        <button type="submit" class="btn btn-info">ارسال</button>
        </div>
    </form>
    </div>
</div>
@stop