@extends('layout.master')
@section('content')
<div class="card">
<h2 class="card-header">آپدیت نویسنده</h2>
    <div class="card-body">
        @include('errors', ['errors' => $errors])
        @if (session('createmsgErr'))
            <div class="alert alert-danger">
                {{session('createmsgErr')}}
            </div>
        @endif
    <form action="" method="post">
        {{csrf_field()}}
        @method('PUT')
        <div class="form-group">
            <label for="name">نام</label>
            <input name="name" type="text" id="name" class="form-control" value="{{old('name',isset($author)? $author->name : '')}}">
        </div>
        <div class="form-group">
            <label for="birthdate">تاریخ تولد</label>
            <input name="birthdate" type="date" id="birthdate" class="form-control" value="{{old('birthdate',isset($author)? $author->birthdate : '')}}">
        </div>
        <div class="form-group text-center">
        <button type="submit" class="btn btn-info">ارسال</button>
        </div>
    </form>
    </div>
</div>
@stop