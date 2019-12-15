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
        @foreach($user_all as $user)
        <div class="form-group">
            <label for="users">{{$user->name}}</label>
            <input name="users[]" type="checkbox" id="users" class="form-control" value="{{$user->id}}" {{in_array($user->id,$selected_user)? 'checked':''}}>
        </div>
            <div class="form-group">
                @foreach ($my as $item)

                    @endforeach
            </div>
        @endforeach
        <button type="submit">submit</button>
    </form>
@stop