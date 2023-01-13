@extends('layouts.tenant.base')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title">
                <p class="fw-bold text-primary">{{ __('Enrollments') }}</p>
            </div>
            <div class="card-toolbar">

                <a href="{{ route('tenant.enrollments.create') }}" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-create-enrollment">
                    {{ __('Create') }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Student') }}</th>
                            <th scope="col">{{ __('Course') }}</th>
                            <th scope="col">{{ __('Batch') }}</th>
                            <th scope="col">{{ __('Date') }}</th>
                            <th scope="col">{{ __('Payment Status') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->user->full_name }}</td>
                                <td>{{ $enrollment->course->title }}</td>
                                <td>{{ $enrollment->batch->title }}</td>
                                <td>{{ $enrollment->created_at }}</td>
                                <td>{{ $enrollment->payment_status }}</td>
                                <td>
                                    <div class="dropdown open ">
                                        <a class="btn p-0 dropdown-toggle hide-arrow" type="button" id="triggerId"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a href="#" class="dropdown-item">Item</a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('modals')
    @include('tenant.modals.create-enrollment')
@endsection
