@extends('layouts.tenant.base')
@section('content')
    <x-card>
        <x-slot:title> Listes de cours </x-slot>
            <x-slot:toolbar>
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-course"><i
                        class="fa fa-plus"></i> {{ __('Créer') }}</a>
                </x-slot>
                <x-slot:body>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Prix</th>
                                    <th>Durée</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img width="40" src="{{ $course->getFirstMediaUrl('cover_photo') }}"
                                                alt="{{ $course->title }}"></td>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->price }}</td>
                                        <td>{{ $course->duration }}</td>
                                        <td>
                                            <a class="btn btn-circle btn-xs btn-default"   href="{{route('tenant.courses.show',$course)}}" > <i class="fa fa-eye"></i></a>
                                            <a class="btn btn-circle btn-xs btn-primary"   href="{{route('tenant.courses.edit',$course)}}" ><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-circle btn-xs btn-danger"    href="{{route('tenant.courses.destroy',$course)}}" ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>   <td colspan="6" class="text-center">{{ __('Pas de cours') }} </td>  </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </x-slot>

    </x-card>

    <div class="row">

    </div>
@endsection

@section('modals')
    @include('tenant.modals.create-course')
@endsection
