@extends('layout.master')
@section('content')
    <div class="card">
        <h3 class="card-header">نام کتاب: {{$book->name}}</h3>
        <div class="card-body">
            <p>تعداد صفحات: {{$book->pages}}</p>
            <p>کد شابک: {{$book->ISBN}}</p>
            <p>قیمت: {{number_format($book->price)}}</p>
            <p>نویسنده:
            @foreach($book->authors as $author)
                <span>{{$author->name}}،</span>
            @endforeach
            </p>
            <p>دسته بندی:
                @foreach($book->categories as $category)
                    <span>{{$category->name}}،</span>
                @endforeach
            </p>
            <p>ایجاد کننده: {{$user->name}}</p>
            <p>تاریخ انتشار: {{$book->published_at}}</p>
            @if (\Illuminate\Support\Facades\Auth::check())
                @can('update',$book)
            <a href="{{route('book.edit',['id'=>$book->id])}}" class="btn btn-warning">ویرایش</a>
                @endcan
            @endif
        </div>
    </div>
@endsection