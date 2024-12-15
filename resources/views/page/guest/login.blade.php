@extends('layout.guest.master')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <form action="{{ route('auth.attemptLogin') }}" method="POST">
        @csrf
        <div class="main-wrapper">
            <div class="login-container" style="background-color: #2D3142; color:#EF8354;">
                <h2>@lang('message.login')</h2>
                <div class="form-group">
                    <label for="username">@lang('message.email')</label>
                    <input type="text" id="email" name="email" class="input-form" placeholder="@lang('message.emailph')"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">@lang('message.password')</label>
                    <input type="password" id="password" class="input-form" name="password" placeholder="@lang('message.passwordph')"
                        required>
                </div>
                <button type="submit" class="btn-submit bg-o text-d" id="login">@lang('message.login')</button>
                <div class="register-link">
                    <p>@lang('message.donthaveacc') <a href={{ route('register') }}>@lang('message.register')</a></p>
                </div>
            </div>
        </div>
    </form>
@endsection
