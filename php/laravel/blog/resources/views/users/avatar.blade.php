@extends('layout.app')
@section('content')
    <form action='{{route("upload_avatar")}}' method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="name" placeholder="姓名">
        <input type="submit">
    </form>
@endsection