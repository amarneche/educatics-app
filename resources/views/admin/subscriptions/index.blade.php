@extends('layouts.admin.base')

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between ">
            <div class="card-title">
                <p class="fw-bold text-primary">{{ __('Subscriptions') }}</p>
            </div>
            <div class="card-toolbar">
                <button class="btn btn-primary">{{ __('Add subscription') }}</button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive-sm">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Tenant') }}</th>
                            <th scope="col">{{ __('Start date') }}</th>
                            <th scope="col">{{ __('End date') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Package') }}</th>
                            <th scope="col">{{ __('Price') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                            <tr>
                                <td>
                                    <a class="fw-bold" href="{{route('admin.schools.show', $subscription->tenant )}}">
                                        {{ $subscription->tenant->school_name }}
                                    </a>

                                </td>
                                <td>{{ $subscription->start_date }}</td>
                                <td>{{ $subscription->end_date }}</td>
                                <td><span class="badge {{ $subscription->statusClass() }}">{{ $subscription->status }}</span></td>
                                <td>{{ $subscription->package->title }}</td>
                                <td>{{ $subscription->package->price }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn p-0 dropdown-toggle hide-arrow" type="button" id="triggerId"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="" class="dropdown-item">Item</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
