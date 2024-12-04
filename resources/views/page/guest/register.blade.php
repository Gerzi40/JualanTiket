@extends('layout.master')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <form action="{{ route('auth.attemptRegister') }}" method="POST">
        @csrf
        <div class="main-wrapper">
            <div class="login-container">
                <h2>Register</h2>
                <div class="form-group">
                    <label for="username">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="username">No. HP</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="dob">Tanggal Lahir</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <input type="text" id="gender" name="gender" required>
                </div>
                <button type="submit" class="btn" id="register">Register</button>
                <div class="register-link">
                    <p>Already have an account? <a href={{ route('login') }}>Login here</a></p>
                </div>
            </div>
        </div>
    </form>
@endsection
