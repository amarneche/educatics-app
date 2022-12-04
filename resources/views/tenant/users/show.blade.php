@extends('layouts.tenant.base')

@section('content')
<x-card>
    <x-slot:title> {{$user->first_name}} </x-slot>
    {{-- <x-slot:toolbar>  
        <button class="btn btn-sm btn-primary"><i class="fa fa-edit">  </i> {{__("Modifier")}} </button>    
    </x-slot> --}}
    <x-slot:body>
        
    </x-slot>
    <x-slot:footer> </x-slot>


</x-card>

@endsection