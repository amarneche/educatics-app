@extends('layouts.tenant.base')
@section('content')
    <x-card>
        <x-slot:title> Listes de cours </x-slot>
            <x-slot:toolbar>
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-course"><i
                        class="fa fa-plus"></i> {{ __('Créer') }}</a>
                </x-slot>

    </x-card>

    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-3 col-sm-6">
                <x-card>
                    <x-slot:image>
                        <img src="{{$course->getFirstMediaUrl('cover_photo') }}" alt="">
                    </x-slot>
                        <x-slot:title> {{ $course->title }} </x-slot>
                            <x-slot:body>
                                <button class="btn btn-primary btn-sm">Voir</button>
                            </x-slot>
                </x-card>
            </div>
        @endforeach
    </div>
@endsection

@section('modals')
    @include('tenant.modals.create-course')
@endsection
