@extends('layouts.tenant.base')

@section('content')
<form action="{{route('tenant.users.update',$user)}}" method="post">
    @method('PATCH')
    @csrf
    <div class="box">
        <div class="box-header">
            <h4 class="box-title">{{__("Créer un utilisateur")}}</h4>
        </div>
        <div class="box-body">
           <div class="row">
            <div class="col-md-6">
                <x-form.input name="last_name" :value="old('last_name')" :label="__('Nom')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="first_name" type="text" :value="old('first_name')" :label="__('Prénom')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="email" type="email" :value="old('email')" :label="__('Email')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="phone" :value="old('phone')" :label="__('Téléphone')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="password" type="password" value="" autocomplete="new-password" :label="__('Mot de passe')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="password_confirmation" type="password" value="" autocomplete="new-password" :label="__('Confirmer mot de passe')" />
            </div>
           </div>

        </div>
        <div class="box-footer">
            <div class="pull-right">
                <a href="{{route('tenant.users.index')}}" class="btn btn-secondary">{{__("Annuler")}}</a>
                <button type="submit" class="btn btn-success"> {{__("Mettre a jour")}} </button>
            </div> 
        </div>
    </div>
</form>
@endsection