<form action="{{ route('admin.schools.store') }}" method="post">
    @csrf 
    @method("post")
<div class="modal modal-right  fade @if($errors->any()) show @endif"  id="modal-create-tenant" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Créer un compte pour votre ecole")}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
                <div class="modal-body overflow-scroll overflow-x-hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <x-form.select :label="__('Choisir un plan:')"  name="package_id">
                                <x-slot:slot>
                                @foreach ($packages as $package)
                                    <option value="{{$package->id}}">{{$package->title}}  <strong>{{$package->price}} DZD/Mois</strong>  </option>
                                @endforeach
                                   
                                </x-slot>
                            </x-form.select>
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="school_name" :value="old('school_name')" :label="__('Nom d\'ecole')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="domain" :value="old('domain')" :label="__('Sous domaine')"  >
                                <x-slot:group> .educatics.net </x-slot>
                            </x-form.input>

                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                    <button  type="submit" class="btn btn-primary float-end">{{ __('Créer') }}</button>
                </div>
            
        </div>
    </div>
</div>
</form>
@if($errors->any())
@section('scripts')
<script>
    $('document').ready(function(){
        $('#modal-create-tenant').modal('show')
    });
</script>
@endsection
@endif