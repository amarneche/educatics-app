@extends('layouts.auth')

@section('content')
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="/" class="app-brand-link gap-2">
                            <span class="app-brand-logo">
                                <strong>SVG </strong>
                            </span>

                            <span class="app-brand-text demo text-body fw-bolder">Educatics</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">{{ __('Welcome to :name', ['name' => 'Educatics']) }} ! 👋</h4>

                    <form id="formAuthentication" class="mb-3" action="{{ route('tenant.login') }}" method="POST">
                        @csrf @method('post')
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="{{ __('Enter your email address') }}" autofocus />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                <a href="{{ route('tenant.password.request') }}">
                                    <small>{{ __('Forgot Password?') }}</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror " name="password"
                                    placeholder="*********" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember_me_token" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> {{ __('Remember Me') }} </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Sign in') }}</button>
                        </div>
                    </form>

                    @if (Route::has('tenant.register'))
                        <p class="text-center">
                            <span>{{ __('New on our platform?') }}</span>
                            <a href="{{ route('tenant.register') }}">
                                <span>{{ __('Create an account') }}</span>
                            </a>
                        </p>
                    @endif
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
@endsection
