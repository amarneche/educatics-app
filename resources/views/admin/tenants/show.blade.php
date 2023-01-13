@extends('layouts.admin.base')

@section('content')
   <div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
            <p class="fw-bold">{{$school->school_name}}</p>
        </div>
    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-md-3 ">
                <div class="card mb-3 text-center p-3 h-100">
                    <p class="fw-bold">{{__("Status")}}</p>
                    <span class="badge {{$school->currentSubscription()->statusClass()}}" >  {{$school->currentSubscription()->status}}  </span>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card mb-3 text-center p-3 h-100">
                    <p class="fw-bold">{{__("Plan")}}</p>
                    <span class="badge bg-success" >  {{$school->currentSubscription()->package->title." ". money($school->currentSubscription()?->package?->price)  }}  </span>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card mb-3 text-center p-3 h-100">
                    <p class="fw-bold">{{__("Expiration period")}}</p>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{$school->currentSubscription()?->remaining_percentage}}%;"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <span class="text-info">{{$school->currentSubscription()?->remainingPeriod()}}</span>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title"><p class="fw-bold">{{__("Users :")}}</p></div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">{{__("Full name")}}</th>
                                <th scope="col">{{__("Email")}}</th>
                                <th scope="col">{{__("Action")}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($school->users() as $user)
                                <tr>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title"><p class="fw-bold">{{__("Invoices :")}}</p></div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>{{__("Number")}}</th>
                                <th>{{__("Total amount")}}</th>
                                <th>{{__("Due Amount")}}</th>
                                <th>{{__("")}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($school->invoices as $invoice)
                                <tr>
                                    <td>{{$invoice->invoice_number}}</td>
                                    <td>{{money($invoice->total_amount)}}</td>
                                    <td>{{money($invoice->total_amount)}}</td>                                    
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title"><p class="fw-bold text-priamry">{{__("Domains :")}}</p></div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive-sm">
                    <table class="table text-center ">
                        <thead>
                            <tr>
                                <th scope="col">{{__("Domain")}}</th>
                                <th scope="col">{{__("Action")}}</th>

                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($school->domains as $domain)
                                <tr>
                                    <td class="fw-bold">{{$domain->domain}}</td>
                                    <td><a href="{{tenant_route($domain->domain,"login")}}" target="_blank" class="btn btn-primary btn-sm ">{{__("Login to control Area")}}</a>    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
   </div>
    
@endsection