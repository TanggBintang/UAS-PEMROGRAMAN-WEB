@extends('layouts.auth')

@section('title', 'Register - News App')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="{{ url('/') }}" class="h1"><b>News</b>App</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                        <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
        </form>

        <div class="social-auth-links text-center mt-2 mb-3">
            <a href="{{ route('social.redirect', 'google') }}" class="btn btn-block btn-danger">
                <i class="fab fa-google mr-2"></i> Sign up using Google
            </a>
            <a href="{{ route('social.redirect', 'github') }}" class="btn btn-block btn-dark">
                <i class="fab fa-github mr-2"></i> Sign up using Github
            </a>
            <a href="{{ route('social.redirect', 'microsoft') }}" class="btn btn-block btn-info">
                <i class="fab fa-microsoft mr-2"></i> Sign up using Microsoft
            </a>
        </div>

        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
</div>
@endsection