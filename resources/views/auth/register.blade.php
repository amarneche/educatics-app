@extends('layouts.auth')

@section('content')
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body ">
                    <!-- Logo -->
                    <div class="app-brand d-flex justify-content-center">
                        <a href="/" class="app-brand-link">
                            <img class="w-100" src="{{ global_asset('assets/images/logo.svg') }}" alt="">

                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">{{ __('Welcome to :name', ['name' => 'Educatics']) }} ! 👋</h4>

                    <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                        @csrf @method('post')
                        <div class="mb-3">
                            <label for="first_name" class="form-label">{{ __('First name') }}</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name" value="{{old('first_name','')}}" id="first_name" aria-describedby="helpId" placeholder="">
                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">{{ __('Last name') }}</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name" value="{{old('last_name','')}}" id="last_name" aria-describedby="helpId" placeholder="">
                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" value="{{old('email',"")}}" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="{{ __('Enter your email address') }}" autofocus />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{old('phone','')}}" placeholder="{{ __('Enter your phone number') }}" autofocus />
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">{{ __('Password') }}</label>

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
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password_confirmation">{{ __('Confirm password') }}</label>

                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror " name="password_confirmation"
                                    placeholder="*********" aria-describedby="password_confirmation" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password_confirmation')
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
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Create an account') }}</button>
                        </div>
                    </form>

                    @if (Route::has('login'))
                        <p class="text-center">
                            <span>{{ __('Already have an account?') }}</span>
                            <a href="{{ route('login') }}">
                                <span>{{ __('Login') }}</span>
                            </a>
                        </p>
                    @endif
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
@endsection
