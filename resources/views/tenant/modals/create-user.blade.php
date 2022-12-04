<form action="{{ route('tenant.users.store') }}" method="post">
    @csrf 
    @method("post")
<div class="modal modal-right  fade @if($errors->any()) show @endif"  id="modal-create-user" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Créer un utilisateur")}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
                <div class="modal-body overflow-scroll overflow-x-hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <x-form.select :label="__('Selectionner le role:')"  name="role">
                                <x-slot:slot>
                                   @foreach($component->getUserRoles() as $role) 
                                    <option value="{{$role}}">{{__($role)}}</option>
                                   @endforeach
                                </x-slot>
                            </x-form.select>
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="last_name" :value="old('last_name')" :label="__('Nom')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="first_name" type="text" :value="old('first_name')" :label="__('Prénom')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="email" type="email" :value="old('email')" :label="__('Email')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="phone" :value="old('phone')" :label="__('Téléphone')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="password" type="password" value="" autocomplete="new-password" :label="__('Mot de passe')" />
                        </div>
                        <div class="col-md-12">
                            <x-form.input name="password_confirmation" type="password" value="" autocomplete="new-password" :label="__('Confirmer mot de passe')" />
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
        $('#modal-create-user').modal('show')
    });
</script>
@endsection
@endif