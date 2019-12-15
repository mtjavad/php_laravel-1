@extends('layout.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
        </div>
    @endif
    <hr>
    <h1>user</h1>
    <form action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">name</label>
            <input name="name" type="text" id="name" class="form-control" value="{{old('name',isset($user->name)? $user->name:'')}}">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input name="email" type="email" id="email" class="form-control" value="{{old('email',isset($user->email)? $user->email:'')}}">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input name="password" type="password" id="password" class="form-control">
        </div>
        <button type="submit">submit</button>
    </form>
@stop