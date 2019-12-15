@extends('layout.master')
@section('content')
    <div class="card">
        <h2 class="card-header">لیست نام دسته بندی ها</h2>
        <div class="card-body">
            @if (session('createmsg'))
                <div class="alert alert-success">
                    {{session('createmsg')}}
                </div>
            @endif

            @foreach ($categories as $category)
                <p><a href="{{route('category.show',['id'=>$category->id])}}">{{$category->name}}</a></p>
            @endforeach
        </div>
    </div>
@endsection