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
                <div class="form-group">
                    <label for="username">@lang('message.fullname')</label>
                    <input type="text" id="name" name="name" class="input-form" placeholder="@lang('message.fullnameph')"
                        required>
                </div>
                <div class="form-group">
                    <label for="username">@lang('message.phonenumber')</label>
                    <input type="text" id="phone" name="phone" class="input-form" placeholder="@lang('message.phonenumberph')"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">@lang('message.email')</label>
                    <input type="text" id="email" name="email" class="input-form" placeholder="@lang('message.emailph')"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">@lang('message.password')</label>
                    <input type="password" id="password" name="password" class="input-form" placeholder="@lang('message.passwordph')"
                        required>
                </div>
                <div class="form-group">
                    <label for="dob">@lang('message.dob')</label>
                    <input type="date" id="dob" name="dob" class="input-form" required>
                </div>
                <div class="form-group">
                    <label for="gender">@lang('message.gender')</label>
                    <input type="text" id="gender" name="gender" class="input-form" placeholder="@lang('message.genderph')"
                        required>
                </div>
                <button type="submit" class="btn-submit bg-o text-d" id="register">@lang('message.register')</button>
                <div class="register-link">
                    <p>@lang('message.haveacc') <a href={{ route('login') }}>@lang('message.login')</a></p>
                </div>
            </div>
        </div>
    </form>
@endsection
