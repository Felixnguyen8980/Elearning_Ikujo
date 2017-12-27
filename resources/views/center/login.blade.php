@extends('master')
@section('title', 'login')
@section('content')
<div id="container">
        <div id="loginBox">
            <div>
                <i id="alertlogin"><?php if(isset($loginabort)){ echo $loginabort;}?></i>
            </div>
            <form action="{{ route('centerpage',['option'=>"login"]) }}" onsubmit="return validate()" method="post">
                {{ csrf_field() }}
                <div>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <input type="password" name="password" id="password">
                </div>
                 <button class="btn" type="submit">Login</button>
            </form>
        </div>
    <script src="{{ asset('js/login.js') }}"></script>
</div>
@endsection