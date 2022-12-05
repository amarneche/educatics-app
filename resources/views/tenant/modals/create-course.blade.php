<form id="myDropzone" action="{{ route('tenant.courses.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="modal modal-right  fade @if ($errors->any()) show @endif" id="modal-create-course"
        tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Créer un cours') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body overflow-scroll overflow-x-hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <x-form.input name="cover_photo" type="file" value="" :label="__('Mettre une photo')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="title" :value="old('title')" :label="__('Titre du cours/Formation')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="price" type="number" :value="old('price')" :label="__('Prix du cours')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="duration" type="number" :value="old('duration')" :label="__('Durée')" />
                        </div>



                    </div>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                    <button type="submit" class="btn btn-primary float-end">{{ __('Créer') }}</button>
                </div>

            </div>
        </div>
    </div>
</form>
@section('scripts')
    <script src="{{ global_asset('assets/vendor_components/dropzone/dropzone.js') }}"></script>
    <script>
        new Dropzone($('#myDropzone')[0], {
            autoProcessQueue: false,
            paramName: "file"
        })
    </script>
    @if ($errors->any())
        <script>
            $('document').ready(function() {
                $('#modal-create-course').modal('show')
            });
        </script>
    @endif
@endsection
