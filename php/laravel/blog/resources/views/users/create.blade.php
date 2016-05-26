@extends('layout.app')
@section('content')
    <form action='{{route("users.store")}}' method="post">
        {{csrf_field()}}
        <input type="text" name="name" placeholder="姓名">
        <input type="password" name="password" placeholder="密码">
        <input type="email" name="email" placeholder="邮箱">
        <input type="submit">
    </form>
@endsection