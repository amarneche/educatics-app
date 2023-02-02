@extends('layouts.auth')

@section('content')
    <!-- Error -->
    
    <div class="row ">
        <div class="col-md-6 m-auto mt-3 mb-3" >
            <div class="card ">
                <div class="card-header">
                    <h2 class="mb-2 mx-2">Page Not Found :(</h2>
                    <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>

                </div>
                <div class="card-body">
                    <div class="mt-3">
                        <img src="{{ global_asset('template/assets/img/illustrations/page-misc-error-light.png') }}"
                            alt="page-misc-error-light" width="300" class="img-fluid"
                            data-app-dark-img="{{ global_asset('illustrations/page-misc-error-dark.png') }}"
                            data-app-light-img="{{ global_asset('illustrations/page-misc-error-light.png') }}" />
                    </div>
                </div>
                <div class="card-footer float-middle">
                    <a href="{{ env('CENTRAL_DOMAIN', 'educatics.net') }}" class="btn btn-primary">{{ __('Back to home') }}</a>

                </div>

            </div>
        </div>
    </div>

    <!-- /Error -->
@endsection
