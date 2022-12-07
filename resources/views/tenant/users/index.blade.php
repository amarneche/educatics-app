@extends('layouts.tenant.base')

@section('content')
    <div class="col-12">
        <x-card>
            <x-slot:title>
                {{ __('Liste des utilisateurs') }}
                </x-slot>
                <x-slot:toolbar>

                    <div class="lookup lookup-sm lookup-right d-none d-lg-block">
                        <input type="text" name="search" placeholder="Rechercher">
                    </div>
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-user"> <i
                            class="fa fa-plus"></i>{{ __('Créer') }}</a>
                    </x-slot>
                    <x-slot:body class="no-padding">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <td>#</td>
                                    <td>{{ __('Nom') }}</td>
                                    <td>{{ __('Prénom') }}</td>
                                    <td>{{ __('Email') }}</td>
                                    <td>{{ __('Roles') }}</td>
                                    <td>{{ __('Action') }}</td>
                                </tr>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td> 
                                            @foreach($user->roles as $role)
                                               <strong> <a href="">{{__($role->name)}}</a></strong> @if(!$loop->last) , @endif
                                            @endforeach
                                        
                                        </td>
                                        <td>
                                            <div class="tools">
                                                <a href="{{ route('tenant.users.edit', ['user' => $user]) }}"
                                                    class="mx-2"> <i class="fa fa-edit"></i></a>
                                                <a href="#" class="mx-2"> <i class="fa fa-trash"></i></a>
                                                <a href="{{ route('tenant.users.show', ['user' => $user]) }}"
                                                    class="mx-2"> <i class="fa fa-eye"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                        </x-slot>

        </x-card>



    </div>
@endsection

@section('modals')
    @include('tenant.modals.create-user')
@endsection
