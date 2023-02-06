@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-0 mt-0">
                        <div class="col-md-12 text-center pt-3">
                            <img src="{{ asset('logos/landing-logo-n.png') }}" class="logo-size" alt="logo">
                        </div>
                    </div>
                    <h2 class="color-primary text-center">Sign in</h2>
                    @if (Route::has('register'))
                    <h6 class="color-primary text-center mb-3">o <a href="{{ route('register') }}"
                            class="no-decoration">regístrate
                            aquí</a> si aún no tienes
                        cuenta.</h6>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-0">

                            <div class="col-md-10 offset-md-1">
                                <v-text-field dense label="Email" class="pt-1" outlined id="email" type="email"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </v-text-field>

                                @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-0">
                            <div class="col-md-10 offset-md-1 pt-0">
                                <v-text-field dense label="Password" class="pt-1" outlined id="password" type="password"
                                    name="password" required autocomplete="current-password">
                                </v-text-field>

                                @error('password')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-0 mt-0">
                            <div class="col-md-12 offset-md-4 pt-2 pb-2">
                                <div class="form-check">
                                    <input class="form-check-input shadow-none" type="checkbox" name="remember"
                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-muted" for="remember" style="font-size: 12px">
                                        {{ __('Remember me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 mt-0">
                            <div class="col-md-12 p-2 text-center">
                                <button type="submit" class="btn btn-normal-forms shadow-none"
                                    style="padding-left: 4rem; padding-right: 4rem;">
                                    {{ __('Sign in') }}
                                </button>
                            </div>
                            <div class="col-md-12 pt-2 pb-2 text-center">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link shadow-none" href="{{ route('password.request') }}">
                                    {{ __('¿Forgot password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection