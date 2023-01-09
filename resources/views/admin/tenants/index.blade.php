@extends('layouts.admin.base')

@section('breadcrumb')
    @include('layouts.components.breadcrumb',
        $data = [
            'title' => __('Ecoles'),
            'links' => [
                'Ecoles' => 'admin.schools.index',
            ],
        ])
@endsection

@section('content')
    <div class="row ">
        @foreach ($schools as $school)
        @can('view',$school)
            <div class="col-md-4 mb-3 ">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">
                            <p class="text-primary fw-bold">{{ $school->school_name }}</p>
                        </div>
                        <div class="card-body">

                        </div>
                        <div class="card-footer d-flex justify-content-between mx-1 p-0">
                            <div class="status">
                                <button class="btn btn-xs btn-primary">
                                    Days left <span class="badge badge-xs bg-light text-primary">12</span>
                                </button>
                            </div>
                            <div class="float-end">
                                <a target="_blank" href="{{ tenant_route($school->domains->first()->domain, 'login') }}"
                                    class="btn btn-xs btn-secondary"> <i class="bi bi-box-arrow-in-right"></i>
                                </a>

                                    <a href="{{ route('admin.schools.show', $school) }}"
                                        class="btn btn-xs btn-circle btn-secondary"> <i class="bi bi-eye"></i>
                                    </a>

                                <a href="{{ route('admin.schools.edit', $school) }}"
                                    class="btn btn-xs btn-circle btn-secondary"> <i class="bi bi-pen"></i> </a>
                                <a href="{{ route('admin.schools.destroy', $school) }}"
                                    class="btn btn-xs btn-circle btn-danger delete_link" data-bs-target="#deleteModal"
                                    data-bs-toggle="modal"> <i class="bi bi-trash"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @endforeach
        @can('create', App\Models\Tenant::class)
            <div class="col-md-3 .col-sm-12  mb-3">
                <a data-bs-toggle="modal" data-bs-target="#modal-create-tenant">
                    <div class="card h-100 ">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <div class="icon">
                                    <i class="bi bi-building-add fw-bold  display-5"></i>
                                </div>
                                <div class="title">
                                    <strong>{{ __('Ajouter un ecole') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


            </div>
        @endcan
    </div>
@endsection

@section('modals')
    @include('admin.modals.create-tenant')
@endsection
