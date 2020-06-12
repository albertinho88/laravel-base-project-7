@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('signin') }}">
                                @csrf
                                <h1>{{ __('Login') }}</h1>
                                <p class="text-muted">Sign In to your account</p>

                                @if ($errors->has('general_message'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first('general_message') }}
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="icon-user"></i>
                                        </span>
                                    </div>
                                    <input id="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required
                                           autocomplete="email"
                                           autofocus
                                           placeholder="{{ __('E-Mail Address') }}">

                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="icon-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password"
                                           type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           required
                                           autocomplete="current-password"
                                           placeholder="{{ __('Password') }}">

                                    @error('password')
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    <div class="col-6 text-right">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            <!--<button class="btn btn-link px-0" type="button">Forgot password?</button>-->
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--<div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>App</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <button class="btn btn-primary active mt-3" type="button">Register Now!</button>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>


@endsection
