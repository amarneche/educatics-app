@extends('layouts.admin.base')

@section('breadcrumb')
    @include("layouts.components.breadcrumb",$data =[
        'title'=>__("Ecoles"),
        'links'=>[
            'Ecoles'=>'admin.schools.index',
        ]
    ])
@endsection

@section('content')
   <div class="row">
    @foreach($schools as $school)
        <div class="col-md-4">
            <x-card >
                <x-slot:title> <strong>{{$school->school_name}}</strong> </x-slot>
                <x-slot:toolbar> <span class="badge badge-secondary">{{$school->status}}</span> </x-slot>
                <x-slot:footer>
                    <div class="d-flex justify-content-between align-items-center">
                       <div>
                            <span class="badge badge-primary"> valid : {{$school->valid_until_formatted}}</span>
                       </div>
                       <div class="pull-left">
                            <a href="{{route('admin.schools.show',$school)}}" class="btn btn-xs btn-circle btn-secondary"> <i class="fa fa-eye"></i> </a>
                            <a href="{{route('admin.schools.edit',$school)}}" class="btn btn-xs btn-circle btn-secondary"> <i class="fa fa-edit"></i> </a>
                            <a href="{{route('admin.schools.destroy',$school)}}" class="btn btn-xs btn-circle btn-danger delete_link" data-bs-target="#deleteModal" data-bs-toggle="modal" > <i class="fa fa-trash"></i> </a>
                       </div>
                    </div>
            </x-slot>
            </x-card>
        </div>
    @endforeach
    @can('create',App\Models\Tenant::class)
    <div class="col-md-3 .col-sm-12">
       <a  data-bs-toggle="modal" data-bs-target="#modal-create-tenant"   >
        <x-card class="p-4">
            <x-slot:title> 
               <div class="text-center">
                    <i class="fa fa-plus fa-2x"></i>
               </div>
            </x-slot>
            <x-slot:body  class="no-padding text-center">
               <strong>{{__('Ajouter un ecole')}}</strong>
            </x-slot>

        </x-card>
       </a>
    </div>
    @endcan
   </div>
   <div class="row">
    @if($schools->count() > 0)
    <x-card>
        <x-slot:title> <h4 class="box-title">{{__("vos ecoles")}}</h4> </x-slot>
        <x-slot:body class="no-padding">  
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('package') }}</th>
                            <th>{{ __('status') }}</th>
                            <th>{{ __('Validité') }}</th>
                            <th>{{ __('domains') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schools as $school)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $school->school_name }}</td>
                            <td>{{ $school->package }}</td>
                            <td>{{ $school->status }}</td>
                            <td>{{ $school->valid_until_formatted }}</td>
                            <td> 
                                @foreach($school->domains as $domain)
                                   <strong> <a href="">{{__($domain->domain)}}</a></strong> @if(!$loop->last) , @endif
                                @endforeach
                            
                            </td>
                            <td>
                                <div class="tools">
                                    <a href="{{ route('admin.schools.edit', ['school' => $school]) }}"
                                        class="mx-2"> <i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.schools.destroy', ['school' => $school])}}" class="mx-2 delete_link " data-bs-toggle="modal" data-bs-target="#deleteModal" > <i class="fa fa-trash"></i></a>
                                    <a href="{{ route('admin.schools.show', ['school' => $school]) }}"
                                        class="mx-2"> <i class="fa fa-eye"></i></a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>
        </x-slot> 
    </x-card>
    @endif
   </div>
    
@endsection

@section('modals')

@include('admin.modals.create-tenant')

@endsection