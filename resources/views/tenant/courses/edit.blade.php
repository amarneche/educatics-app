@extends('layouts.tenant.base')

@section('content')
    <form action="{{ route('tenant.courses.update', $course) }}" method="post">

        @method('patch')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <p class="fw-bold text-primary">{{ __('Course information') }}</p>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" value="{{ old('name', $course->title) }}"
                                class="form-control @error('title') is-invalid @enderror " name="title" id="title"
                                aria-describedby="Tilte help" placeholder="">
                            @error('title')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">{{ __('Slug') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" value="{{ old('name', $course->slug) }}"
                                class="form-control @error('slug') is-invalid @enderror " name="slug" id="slug"
                                aria-describedby="Tilte help" placeholder="">
                            @error('slug')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">{{ __('Price') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="number" value="{{ old('price', $course->price) }}"
                                        class="form-control @error('price') is-invalid @enderror " name="price"
                                        id="price" aria-describedby="Tilte help" placeholder="">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sale_price" class="form-label">{{ __('Sale price') }}</label>
                                    <input type="number" value="{{ old('sale_price', $course->sale_price) }}"
                                        class="form-control @error('sale_price') is-invalid @enderror " name="sale_price"
                                        id="sale_price" aria-describedby="Tilte help" placeholder="">
                                    @error('sale_price')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sale_price_effective_starts"
                                        class="form-label">{{ __('Sale price effective date') }}</label>
                                    <input type="datetime-local" class="form-control"
                                        value="{{ old('sale_price_effective_starts', $course->sale_price_effective_starts) }}"
                                        name="sale_price_effective_starts" id="sale_price_effective_starts"
                                        aria-describedby="helpId" placeholder="">
                                    <small id="helpId"
                                        class="form-text text-muted">{{ __('Date and time salle price to be considered') }}</small>
                                    @error('sale_price_effective_starts')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sale_price_effective_ends"
                                        class="form-label">{{ __('Sale price effective date ends') }}</label>
                                    <input type="datetime-local" class="form-control"
                                        value="{{ old('sale_price_effective_ends', $course->sale_price_effective_ends) }}"
                                        name="sale_price_effective_ends" id="sale_price_effective_ends"
                                        aria-describedby="helpId" placeholder="">
                                    <small id="helpId"
                                        class="form-text text-muted">{{ __('Date and time salle price to be considered') }}</small>
                                    @error('sale_price_effective_starts')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <p class="fw-bold text-primary">
                            {{ __('Short description') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="short_description" class="form-label">{{ _('Short description') }}</label>
                            <textarea class="form-control" name="short_description" id="short_description" rows="3">{{ old('short_description', $course->short_description) }}</textarea>
                        </div>
                    </div>

                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <p class="fw-bold text-primary"> {{ __('Course full description') }} </p>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="full_description" class="form-label">{{ __('Course Full description') }}</label>
                            <textarea class="form-control" name="full_description" id="full_description" rows="10">{{ old('full_description', $course->full_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-image position-relative">
                            
                            <span class="span position-absolute badge-circle bg-primary">x</span>
                        </div>
                        <label for="cover_photo" class="form-label">{{ __('Cover picture') }}</label>
                        <input type="file" class="form-control" name="cover_photo" id="cover_photo"
                            aria-describedby="" placeholder="">
                        @error('cover_photo')
                            <div class="invalid-feedback">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="duration" class="form-label">{{ __('Duration') }}</label>
                                    <input type="number" class="form-control" name="duration" id="duration"
                                        aria-describedby="helpId" placeholder="">
                                    <small id="helpId"
                                        class="form-text text-muted">{{ __('Duration of this course') }}</small>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="duration_unit" class="form-label">{{ __('Unit') }}</label>
                                    <select class="form-select " name="duration_unit" id="duration_unit">
                                        <option value="minute"selected>{{__("Minute")}}</option>
                                        <option value="hour">{{__("Minute")}}</option>
                                        <option value="day">{{__("Day")}}</option>
                                        <option value="week">{{__("Day")}}</option>
                                        <option value="month">{{__("Month")}}</option>
                                        <option value="session">{{__("Session")}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="status" class="form-label">{{ __('Status') }}</label>
                                <select class="form-select" name="status" id="">
                                    <option value="draft">{{__("Draft")}}</option>
                                    <option value="active">{{__("Active")}}</option>
                                    <option value="paused">{{__("Paused")}}</option>
                                </select>
                                <small
                                    class="form-text text-muted">{{ __('Only active courses will show to students') }}</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">{{ __('Category') }}</label>
                                <select class="form-select select2 " name="category_id[]" id="category_id"
                                    multiple="multiple">
                                    <option selected>Category one ...</option>
                                    <option value="">New Delhi</option>
                                    <option value="">Istanbul</option>
                                    <option value="">Jakarta</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="learning_model" class="form-label">{{ __('Learning model') }}</label>
                                <select class="form-select select2 " name="learning_model" id="learning_model">
                                    <option selected>{{ __('Online Course') }}</option>
                                    <option value="offline">{{ __('Offline Course') }}</option>
                                    <option value="blended">{{ __('Blended') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-grow-1">
                                <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ global_asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ global_asset('assets/plugins/ckeditor/upload-adapter.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            coverPhoto = document.getElementById('cover_photo');
            FilePond.create(coverPhoto);

            ClassicEditor.create(document.getElementById("full_description"),{
                extraPlugins: [ UploadAdapterPlugin]
            });
            ClassicEditor.create(document.getElementById("short_description"));
        });
    </script>
@endsection
