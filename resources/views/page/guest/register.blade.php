@extends('layout.guest.master')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <form action="{{ route('auth.attemptRegister') }}" method="POST">
        @csrf
        <div class="main-wrapper">
            <div class="login-container" style="background-color: #2D3142; color:#EF8354;">
                <h2>@lang('message.register')</h2>
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="input-form" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="input-form" value="{{ old('phone') }}"
                        required>
                    @error('phone')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-form" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input-form" required>
                    @error('password')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" class="input-form" value="{{ old('dob') }}"
                        required>
                    @error('dob')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="input-form" required>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn-submit bg-o text-d" id="register">@lang('message.register')</button>
                <div class="register-link">
                    <p>@lang('message.haveacc') <a href={{ route('login') }}>@lang('message.login')</a></p>
                </div>
            </div>
        </div>
    </form>
@endsection
