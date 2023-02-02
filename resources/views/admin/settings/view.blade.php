@extends('layouts.admin.base')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">{{ __('Website Settings') }}</h5>
        <!-- Account -->
        <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.save') }}">

            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="" alt="user-avatar" class="d-block rounded" height="100" width="100"
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
                @csrf @method('post')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">{{__("Site name")}}</label>
                          <input type="text"
                            class="form-control" name="settings[site_name]" value="{{config('site_name')}}" id="" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">{{__("Business Adresse")}}</label>
                          <input type="text"
                            class="form-control" name="settings[business_adress]" value="{{config('business_adress')}}" id="" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">{{__("Business Phone")}}</label>
                          <input type="text"
                            class="form-control" name="settings[business_phone]" value="{{config('business_phone')}}" id="" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">{{__("Facebook page")}}</label>
                          <input type="text"
                            class="form-control" name="settings[facebook_page]" value="{{config('facebook_page')}}" id="" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">{{__("Instagram page")}}</label>
                          <input type="text"
                            class="form-control" name="settings[instagram_page]" value="{{config('instagram_page')}}" id="" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">{{__("Linkedin page")}}</label>
                          <input type="text"
                            class="form-control" name="settings[linkedin_page]" value="{{config('linkedin_page')}}" id="" aria-describedby="helpId" placeholder="">
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
