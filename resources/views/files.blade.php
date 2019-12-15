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
      <td>نام فایل</td>
      <td>نوع فایل</td>
      <td>آدرس فایل</td>
      <td>عملیات</td>
      </thead>
      <tbody>
      @foreach($file_all as $file)
          <tr>
              <td>{{$file->file_id}}</td>
              <td>{{$file->file_name}}</td>
              <td>{{$file->file_type}}</td>
              <td>{{$file->file_path}}</td>
              <td>
                  <a class="btn btn-warning" href="{{route('admin.download',$file->file_id)}}">دانلود</a>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>

@stop