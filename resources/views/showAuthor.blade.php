@extends('layout.master')
@section('content')
    <div class="card">
        <h3 class="card-header">نام نویسنده: {{$author->name}}</h3>
        <div class="card-body">
            <p>تاریخ تولد: {{$author->birthdate}}</p>
            @if (\Illuminate\Support\Facades\Auth::check())
            <a href="{{route('author.edit',['id'=>$author->id])}}" class="btn btn-warning">ویرایش</a>
            @endif
        </div>
    </div>
@endsection