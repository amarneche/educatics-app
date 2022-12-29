@extends('layouts.admin.base')

@section('content')
<form action="{{route('admin.users.store')}}" method="post">
    @method('post')
    @csrf
    <div class="card">
        <div class="card-header">
            <p class="fw-bold text-primary">{{__('Create new user')}}</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="first_name" class="form-label">{{__("First name")}}</label>
                      <input type="text"
                        class="form-control" name="first_name" id="first_name" aria-describedby="firstNameHelpId" placeholder="">
                   
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="last_name" class="form-label">{{__("Last name")}}</label>
                      <input type="text"
                        class="form-control" name="last_name" id="last_name" aria-describedby="LastNameHelpId" placeholder="">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="email" class="form-label">{{__("Email")}}</label>
                      <input type="email"
                        class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="" class="form-label">{{__("Phone number")}}</label>
                      <input type="phone" class="form-control" name="phone" id="phone"
                        class="form-control"  aria-describedby="helpId" placeholder="phone number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="password" class="form-label">{{__("Password")}}</label>  
                      <input type="password" class="form-control" name="password" id="" placeholder="***********">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="password_confirmation" class="form-label">{{__("Password confirmation")}}</label>  
                      <input type="password" class="form-control" name="password_confirmation" id="" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
           
            <div class="float-end">
                <a href="{{route('admin.users.index')}}" class="btn btn-secondary">{{__("Cancel")}}</a>
                <button type="submit" class="btn btn-primary">{{__("Create")}}</button>
            </div>
        </div>
    </div>
</form>
@endsection