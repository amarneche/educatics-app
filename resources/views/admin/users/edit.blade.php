@extends('layouts.admin.base')

@section('content')
<form action="{{route('admin.users.update',$user)}}" method="post">
    @method('PATCH')
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__("Créer un utilisateur")}}</h4>
        </div>
        <div class="card-body">
           <div class="row">
            <div class="col-md-12">
                <x-form.select :label="__('Selectionner le role:')"  name="role">
                    <x-slot:slot>
                        <option  disabled selected > {{__('Selectionner le role')}} </option>
                       @foreach($component->getUserRoles() as $role) 
                        <option value="{{$role}}" @selected($user->hasRole($role) )  >{{__($role)}}</option>
                       @endforeach
                    </x-slot>
                </x-form.select>
            </div>
            <div class="col-md-6">
                <x-form.input name="last_name" :value="old('last_name',$user->last_name)" :label="__('Nom')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="first_name" type="text" :value="old('first_name',$user->first_name)" :label="__('Prénom')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="email" type="email" :value="old('email',$user->email) " :label="__('Email')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="phone" :value="old('phone',$user->phone)" :label="__('Téléphone')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="password" type="password" value="" autocomplete="new-password" :label="__('Mot de passe')" />
            </div>
            <div class="col-md-6">
                <x-form.input name="password_confirmation" type="password" value="" autocomplete="new-password" :label="__('Confirmer mot de passe')" />
            </div>
           </div>

        </div>
        <div class="card-footer">
            <div class="float-end">
                <a href="{{route('admin.users.index')}}" class="btn btn-secondary">{{__("Cancel")}}</a>
                <button type="submit" class="btn btn-primary"> {{__("Update")}} </button>
            </div> 
        </div>
    </div>
</form>
@endsection