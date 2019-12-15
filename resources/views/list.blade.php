@extends('layout.master')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
  <table class="table table-bordered">
      <thead>
      <td>آی دی</td>
      <td>نام</td>
      <td>ایمیل</td>
      <td>پسورد</td>
      <td>تاریخ ایجاد</td>
      <td>زوج یا فرد</td>
      <td>عملیات</td>
      </thead>
      <tbody>
      @foreach($users as $user)
          @include('layout.tbody',$user)
      @endforeach
      </tbody>
  </table>

@stop