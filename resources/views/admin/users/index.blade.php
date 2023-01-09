@extends('layouts.admin.base')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title">
                <p class="text-primary fw-bold">{{ __('Liste all users') }}</p>
            </div>
            <div class="card-toolbar">
                <button class="btn btn-primary"data-bs-target="#modal-create-user" data-bs-toggle="modal"> Create new user</button>
            </div>
        </div>
        <div class="table-responsive-sm text-nowrap">
            <table class="table table-striped table-hover	 table-borderless align-middle">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('First name') }}</th>
                        <th>{{ __('Last name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('phone') }}</th>
                        <th>{{ __('Roles') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider py-2">
                    @foreach ($users as $user)
                        <tr class="">
                            <td scope="row">{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <strong> <a href="">{{ __($role->name) }}</a></strong>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn p-0 dropdown-toggle hide-arrow" type="button" id="triggerId"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </a>
                                    <div class="dropdown-menu">
                                        @can("update",$user) <a href="{{route('admin.users.edit',$user)}}" class="dropdown-item">{{__("Edit")}}</a> @endcan
                                        @can("view",$user)<a href="{{route('admin.users.show',$user)}}" class="dropdown-item">{{__("View")}}</a>  @endcan 
                                        @can("delete",$user)<a href="{{route('admin.users.destroy',$user)}}" class="dropdown-item">{{__("Delete")}}</a> @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>

                </tfoot>
            </table>

        </div>
        <div class="table-footer">
            <div class="pagination">
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection

@section('modals')
    @include('admin.modals.create-user')
@endsection
