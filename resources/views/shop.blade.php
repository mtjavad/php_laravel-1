@extends('layout.master')
@section('content')
    <hr>
    <h1>shop</h1>
    @if (session('alert'))
        {{session('alert')}}
    @endif

    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">نام فایل</label>
            <input name="name" type="text" id="name" class="form-control" value="{{old('name',isset($user->name)? $user->name:'')}}">
        </div>

        <div class="form-group">
            <label for="file">فایل </label>
            <input name="file" type="file" id="file" class="form-control">
        </div>
        <button type="submit">submit</button>
    </form>
@stop