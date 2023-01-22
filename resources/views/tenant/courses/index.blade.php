@extends('layouts.tenant.base')
@section('content')
    <div class="card ">

        <div class="card-header d-flex justify-content-between">
            <div class="card-title">
                <p class="text-primary fw-bold">{{ __('Courses') }}</p>
            </div>
            <div class="card-toolbar">
                @can('create', App\Models\Course::class)
                    <a href="{{ route('tenant.courses.create') }}" class="btn btn-primary">Create</a>
                @endcan
            </div>
        </div>


        <div class="card-body p-0 mb-5 ">
            <div class="table-responsive-sm">
                <table class="table m-0">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Cost') }}</th>
                            <th>{{ __('Sale price') }}</th>
                            <th>{{ __('Duaration') }}</th>
                            <th>{{ __('Students') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('tenant.courses.show', $course) }}">
                                        <img class="img-responsive rounded"
                                            src="{{ $course->getFirstMediaUrl('cover_photo', 'thumb') }}" alt=""
                                            width="75">
                                    </a>
                                </td>
                                <td><a href="{{ route('tenant.courses.show', $course) }}" class="fw-bold">
                                        {{ $course->title }}
                                    </a></td>
                                <td>{{ $course->price }} </td>
                                <td>{{ $course->sale_price }} </td>
                                <td>{{ $course->duration_formatted }} </td>
                                <td><span class="badge rounded-pill bg-primary">{{ $course->enrollments->count() }}</span>
                                </td>
                                <td><span class="badge rounded-pill bg-secondary">{{ $course->status }}</span> </td>
                                <td>
                                    <div class="dropdown open">
                                        <a class="btn p-0 dropdown-toggle hide-arrow" type="button" id="triggerId"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            @can('view', $course)
                                                <a class="dropdown-item" href="{{ route('tenant.courses.show', $course) }}">
                                                    {{ __('View') }}
                                                </a>
                                            @endcan
                                            @can('update', $course)
                                                <a class="dropdown-item" href="{{ route('tenant.courses.edit', $course) }}">
                                                    {{ __('Edit') }}
                                                </a>
                                            @endcan
                                            @can('delete', $course)
                                                <a class="dropdown-item delete_link"
                                                    href="{{ route('tenant.courses.destroy', $course) }}"
                                                    data-bs-target="#deleteModal" data-bs-toggle="modal">
                                                    {{ __('Delete') }}
                                                </a>
                                            @endcan

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center fw-bold"> {{ __('No Course found') }}</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
    </div>
@endsection

@section('modals')
    @can('create', App\Models\Course::class)
        @include('tenant.modals.create-course')
    @endcan
@endsection
