@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">{{ __('Créez un compte pour commencer à utiliser') }}
                            <strong>educatics</strong> </h4>
                    </div>
                    <div class="box-body">
                        <form class="form" action="{{ route('onboarding.store') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i>
                                    {{ __('Informations personelle') }}</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('last_name') has-error @enderror " >
                                            <label class="form-label">{{ __('Votre nom de famille') }}</label>
                                            <input name="last_name" value="{{old('last_name','')}}" type="text" class="form-control">
                                            @error('first_name')
                                                <span class="help-block">  {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('first_name') has-error @enderror ">
                                            <label class="form-label "> {{ __('Votre prénom') }} </label>
                                            <input name="first_name" value="{{old('first_name','')}}" type="text" class="form-control">
                                            @error('first_name')
                                                <span class="help-block">  {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('email') has-error @enderror ">
                                            <label class="form-label">E-mail</label>
                                            <input name="email" type="email" value="{{old('email','')}}" class="form-control" placeholder="E-mail">
                                        @error('email') 
                                        <span class="help-block">  {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('phone') has-error @enderror ">
                                            <label class="form-label">{{ __('Numéro de téléphone') }}</label>
                                            <input name="phone" value="{{old('phone','')}}" type="text" class="form-control">
                                            @error('phone')
                                            <span class="help-block">  {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('password') has-error @enderror">
                                            <label class="form-label">{{ __('Entrez un mot de passe') }}</label>
                                            <input name="password" type="password" class="form-control"
                                                placeholder="********">
                                            
                                            @error('password')
                                            <span class="help-block">  {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('password_confirmation') has-error @enderror)">
                                            <label class="form-label">{{ __('Confirmer votre mot de passe') }}</label>
                                            <input name="password_confirmation" type="password" class="form-control">
                                            @error('password_confirmation')
                                                <span class="help-block">  {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Requirements</h4>
                                <hr class="my-15">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('school_name') has-error @enderror ">
                                            <label class="form-label">{{ __('Le nom de votre école') }}</label>
                                            <input name="school_name" type="text" value="{{old('school_name','')}}" class="form-control">
                                            @error('school_name')
                                                <span class="help-block">  {{$message}} </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('domain' ) has-error @enderror ">
                                            <label class="form-label">{{__("Choisissez un sous domaine")}}</label>
                                            <div class="input-group @error('domain' ) has-error @enderror">
                                                <input name="domain" value="{{old('first_name','')}}" type="text" class="form-control">
                                                <span class="input-group-text">
                                                    .educatics.net
                                                </span>
                                            </div>
                                            @error('domain')
                                            <span class="help-block">  {{$message}} </span>
                                            @enderror

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-warning me-1">
                                    <i class="ti-trash"></i> {{ __('Annuler') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> {{ __('Créer mon compte') }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    @endsection
