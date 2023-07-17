@extends('layouts.app')

@section('content')
<section id="hero" class="login" style="
    height: auto;
    display: block;
    text-transform: none;
    font-size: 14px;
    background:url({{ asset('images/private-service.jpg') }})  no-repeat center center;
    background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <div id="login">
                    <div class="text-center"><img src="{{ $_setting->logo }}" alt="{{ $_setting->title }}" width="160" height="34"></div>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="form-group">
                            <label>{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn_full"> {{ __('Login') }}</button>
                        <a href="{{ route('register') }}" class="btn_full_outline">{{ __('Register') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
