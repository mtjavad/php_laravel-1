@extends('layout.master')
@section('content')
    <div class="card">
        <h2 class="card-header">فرم ثبت نام</h2>
        <div class="card-body">
            @include('errors', ['errors' => $errors])
            <form action="" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">نام</label>
                    <input name="name" type="text" id="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="phone_number">شماره موبایل</label>
                    <input name="phone_number" type="text" id="phone_number" class="form-control" value="{{old('phone_number')}}">
                </div>
                <div class="form-group">
                    <label for="national_code">کد ملی</label>
                    <input name="national_code" type="text" id="national_code" class="form-control" value="{{old('national_code')}}">
                </div>

                <div class="form-group">
                    <label for="password">کلمه عبور</label>
                    <input name="password" type="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">تکرار کلمه عبور</label>
                    <input name="password_confirmation" type="password" id="password_confirmation" class="form-control">
                </div>
                <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">ثبت نام</button>
                </div>
            </form>
        </div>
    </div>
@stop