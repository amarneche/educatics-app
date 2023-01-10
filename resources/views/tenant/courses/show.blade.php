@extends('layouts.tenant.base')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        <p class="text-primary fw-bold">{{ $course->title }}</p>
                        <span><strong>{{__("Price")}}</strong> {{$course->price}}</span>
                        <span><strong>{{__("Sale price")}}</strong> {{$course->sale_price}}</span>
                    </div>
                    <div class="card-toolbar">
                        @can('update', $course)
                            <a href="{{ route('tenant.courses.edit', $course) }}"
                                class="btn btn-primary mx-2">  <i class="bi bi-pencil-square"></i> {{ __('Edit') }}</a>
                        @endcan
                        @can('create', App\Models\Course::class)
                            <a href="{{ route('tenant.courses.create') }}" class="btn btn-primary"><i class="bi bi-mortarboard"></i> {{ __('Create new course') }}
                            </a>
                        @endcan
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="row mb-3">

        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        <p class="fw-bold text-primary">{{ __('Enrollments') }}</p>
                    </div>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-primary">   <i class="bi bi-person-add"></i> {{ __('Enroll new student') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Full name') }}</th>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">{{ __('Paiment status') }}</th>
                                    <th scope="col"> {{ __('Action') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">
                                        <a href="">
                                            <strong>Amar neche</strong>
                                        </a>
                                    </td>
                                    <td>03 Janvier 2023</td>

                                    <td>
                                        <a href="#" class="badge  text-dark">#inv104</a>
                                        <span class="badge bg-success">Paid</span>
                                    </td>
                                    <td>
                                        <div class="dropdown open">
                                            <a class="btn p-0 dropdown-toggle hide-arrow" type="button" id="triggerId"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <a href="#" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        <p class="fw-bold text-primary">{{ __('Planning') }}</p>
                    </div>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-primary"> <i class="bi bi-calendar-plus"></i> {{ __('Plan Session') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Full name') }}</th>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">{{ __('Paiment status') }}</th>
                                    <th scope="col"> {{ __('Action') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">
                                        <a href="">
                                            <strong>Amar neche</strong>
                                        </a>
                                    </td>
                                    <td>03 Janvier 2023</td>

                                    <td>
                                        <a href="#" class="badge  text-dark">#inv104</a>
                                        <span class="badge bg-success">Paid</span>
                                    </td>
                                    <td>
                                        <div class="dropdown open">
                                            <a class="btn p-0 dropdown-toggle hide-arrow" type="button" id="triggerId"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <a href="#" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        <p class="fw-bold text-primary">{{ __('Groups') }}</p>
                    </div>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-primary">   <i class="bi bi-node-plus"></i>   {{ __('Create new group') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Full name') }}</th>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">{{ __('Paiment status') }}</th>
                                    <th scope="col"> {{ __('Action') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">
                                        <a href="">
                                            <strong>Amar neche</strong>
                                        </a>
                                    </td>
                                    <td>03 Janvier 2023</td>

                                    <td>
                                        <a href="#" class="badge  text-dark">#inv104</a>
                                        <span class="badge bg-success">Paid</span>
                                    </td>
                                    <td>
                                        <div class="dropdown open">
                                            <a class="btn p-0 dropdown-toggle hide-arrow" type="button" id="triggerId"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <a href="#" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
