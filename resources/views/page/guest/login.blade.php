@extends('layout.guest.master')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <form action="{{ route('auth.attemptLogin') }}" method="POST">
        @csrf
        <div class="main-wrapper">
            <div class="login-container" style="background-color: #2D3142; color:#EF8354;">
                <h2>Login</h2>
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" id="email" name="email" class="input-form" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="input-form" name="password" required>
                </div>
                <button type="submit" class="btn-submit bg-o text-d" id="login">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href={{ route('register') }}>Register here</a></p>
                </div>
            </div>
        </div>
    </form>
@endsection
