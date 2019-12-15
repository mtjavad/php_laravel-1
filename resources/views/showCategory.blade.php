@extends('layout.master')
@section('content')
    <div class="card">
        <h3 class="card-header">نام دسته بندی: </h3>
        <div class="card-body">
            <p>{{$category->name}}</p>
            @if (\Illuminate\Support\Facades\Auth::check())
            <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-warning">ویرایش</a>
            @endif
        </div>
    </div>
@endsection