@extends('layout.master')
@section('content')
    <div class="card">
        <h2 class="card-header">لیست نام کتاب ها</h2>
        <div class="card-body">
            @if (session('createmsg'))
                <div class="alert alert-success">
                    {{session('createmsg')}}
                </div>
            @endif

            @foreach ($books as $book)
                <p><a href="{{route('book.show',['id'=>$book->id])}}">{{$book->name}}</a></p>
            @endforeach
        </div>
    </div>
@endsection