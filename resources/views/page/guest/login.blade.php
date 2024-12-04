@extends('layout.master')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<form action="{{ route('form.submit') }}" method="POST">
    <div class="main-wrapper">
        <div class="login-container">
            <h2>Login</h2>
            <div class="form-group">
                <label for="username">Email</label>
                <input type="text" id="email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn" id="login">Login</button>
            <div class="register-link">
                {{-- <p>Don't have an account? <a href={{ route('auth.registerUserPage') }}>Register here</a></p> --}}
            </div>
        </div>
    </div>
</form>
@endsection
