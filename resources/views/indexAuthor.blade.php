@extends('layout.master')
@section('content')
    <div class="card">
        <h2 class="card-header">لیست نام نویسنده ها</h2>
        <div class="card-body">
            @if (session('createmsg'))
                <div class="alert alert-success">
                    {{session('createmsg')}}
                </div>
            @endif

            @foreach ($authors as $author)
                <p><a href="{{route('author.show',['id'=>$author->id])}}">{{$author->name}}</a></p>
            @endforeach
        </div>
    </div>
@endsection