<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        $tenant=tenant();
        if(is_null($tenant)){
            return redirect()->route(RouteServiceProvider::HOME);
        }
        else{
            $subscriptions=$tenant->subscriptions()->orderBy('created_at', 'desc')->get();
            $validSubscription=$subscriptions->first(fn($subscription)=>$subscription->isValid());
            if(!$validSubscription ||  !$validSubscription->isValid()){
                return redirect()->route('tenant.subscription.expired');
            }
        }
        return $next($request);
    }
}
