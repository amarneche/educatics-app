@extends('layouts.tenant.base')
@section('content')
    <div class="row">
        <x-card>
            <x-slot:title> {{ $course->title }} </x-slot>
                <x-slot:toolbar>

                    <a href="{{ route('tenant.courses.edit', $course) }}" class="btn btn-sm btn-secondary"> <i
                            class="fa fa-edit"></i> {{ __('Modifier') }} </a>
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal-create-course"><i class="fa fa-plus"></i> {{ __('Créer') }}
                    </a>
                </x-slot>

        </x-card>
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-card>
                <x-slot:image> <img src="{{ $course->getFirstMediaUrl('cover_photo') }}" alt="" class="card-img-top"
                        style="width: 100%; aspect-ratio: 16 / 9;object-fit: cover;">
                    </x-slot>
                    <x-slot:title> {{ $course->title }} </x-slot>
                        <x-slot:body>
                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Champ') }}</th>
                                            <th>{{ __('Valeur') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Prix ') }}</td>
                                            <td>{{ $course->price }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Durée ') }}</td>
                                            <td>{{ $course->duration }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </x-slot>
            </x-card>
        </div>
        <div class="col-md-8">
            <x-card>
                <x-slot:title>{{ __('Etudiants:') }} </x-slot>
                    <x-slot:toolbar>
                        <a href="" class="btn btn-sm btn-primary"> <i
                                class="fa fa-plus"></i>{{ __('Ajouter un etudiant') }} </a>
                        </x-slot>
                        <x-slot:body>
                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    @isset($course->students)
                                    @else
                                        <tr>
                                            <td>{{ __("Ce cours n'a aucun étudiant") }}</td>
                                        </tr>
                                    @endisset
                                </table>
                            </div>
                        </x-slot>
            </x-card>
        </div>
    </div>
@endsection
