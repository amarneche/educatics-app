@extends('layouts.tenant.base')

@section('content')
    <div class="col-12">
        <div class="card mb-3 ">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title">
                    <p class="fw-bold text-primary">{{ __('Users :') }}</p>
                </div>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="button" aria-pressed="false"
                        autocomplete="off">{{ __('Filter') }}</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-user">Create new
                        user</button>
                </div>
            </div>
            <div class="card-body p-0 mb-5">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Photo') }}</th>
                                <th scope="col">{{ __('First name') }}</th>
                                <th scope="col">{{ __('Last name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Roles') }}</th>
                                <th scope="col"> {{ __('Action') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><img src="{{ $user->photo }}" alt="" width="40"></td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class=" "> <strong>{{ __($role->name) }}</strong> </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="dropdown open ">
                                            <a class="btn p-0 dropdown-toggle hide-arrow" type="button" id="triggerId"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                @can("view",$user) <a class="dropdown-item"  href="{{ route('tenant.users.show', $user) }}">{{ __('View') }}</a>    @endcan
                                                @can('update',$user) <a href="{{route('tenant.users.edit', $user)}}" class="dropdown-item">{{__("Edit")}}</a> @endcan
                                                @can('delete',$user) <a class="dropdown-item delete_link" data-bs-toggle="modal" data-bs-target="#deleteModal" >{{ __('Delete') }}</a>  @endcan
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



    </div>
@endsection

@section('modals')
    @include('tenant.modals.create-user')
@endsection
