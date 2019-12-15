@extends('layout.master')
@section('content')
    <div class="card">
        <h2 class="card-header">فرم ورود</h2>
        <div class="card-body">
            @if ((session('msglogn')))
                <div class="alert alert-danger">
                    {{session('msglogn')}}
                </div>
            @endif
                @if ((session('msgreg')))
                    <div class="alert alert-success">
                        {{session('msgreg')}}
                    </div>
                @endif
            @include('errors', ['errors' => $errors])
            <form action="" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="phone_number">شماره موبایل</label>
                    <input name="phone_number" type="tel" id="phone_number" class="form-control" value="{{old('phone_number')}}">
                </div>
                <div class="form-group">
                    <label for="password">کلمه عبور</label>
                    <input name="password" type="password" id="password" class="form-control">
                </div>
                <div class="form-group text-center">
                <button type="submit" class="btn btn-success">ورود</button>
                </div>
            </form>
        </div>
    </div>
@stop