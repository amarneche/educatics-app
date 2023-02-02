@extends('layouts.admin.base')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">{{ __('Profile details') }}</h5>
        <!-- Account -->
        <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{ route('admin.profile.update') }}">

            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ $user->avatarUrl() }}" alt="user-avatar" class="d-block rounded" height="100" width="100"
                        id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">{{ __('Upload new photo') }}</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" name="avatar" id="upload" class="account-file-input" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">{{ __('Reset') }}</span>
                        </button>

                        <p class="text-muted mb-0">{{ __('Allowed JPG, GIF or PNG. Max size of 800K') }}</p>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                @csrf @method('patch')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">{{ __('Last name') }}</label>
                            <input type="text" value="{{ $user->last_name }}"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                id="last_name" placeholder="">
                            @error('last_name')
                                <div class="invalid-feedback">
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">{{ __('First name') }}</label>
                            <input type="text" value="{{ $user->first_name }}"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                id="first_name" placeholder="">
                            @error('first_name')
                                <div class="invalid-feedback">
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('Phone number') }}</label>
                            <input type="text" value="{{ $user->phone }}"
                                class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                                placeholder="">
                            @error('phone')
                                <div class="invalid-feedback">
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email adress') }}</label>
                            <input type="email" value="{{ $user->email }}"
                                class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                placeholder="">
                            @error('email')
                                <div class="invalid-feedback">
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <div class="">
                    <button type="submit" class="btn btn-primary me-2">{{ __('Save changes') }}</button>
                    <button type="reset" class="btn btn-outline-secondary">{{ __('Cancel') }}</button>
                </div>
            </div>
            <!-- /Account -->
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function(e) {
            (function() {
                const deactivateAcc = document.querySelector('#formAccountDeactivation');

                // Update/reset user image of account page
                let accountUserImage = document.getElementById('uploadedAvatar');
                const fileInput = document.querySelector('.account-file-input'),
                    resetFileInput = document.querySelector('.account-image-reset');

                if (accountUserImage) {
                    const resetImage = accountUserImage.src;
                    fileInput.onchange = () => {
                        if (fileInput.files[0]) {
                            accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                        }
                    };
                    resetFileInput.onclick = () => {
                        fileInput.value = '';
                        accountUserImage.src = resetImage;
                    };
                }
            })();
        });
    </script>
@endsection
