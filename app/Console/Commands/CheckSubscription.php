<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:check {--add-days=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subscriptions= Subscription::all();
        $this->comment('Checking subscription status...');
        foreach($subscriptions as $subscription){
          
            // update expired subscriptions 
            if(Carbon::today()->gte($subscription->end_date)&& ($subscription->status =="active" || $subscription->status=="trial")){
                $subscription->status ="expired";
                $subscription->save();
                $this->line("Subscription $subscription->id  Marked as expired!");
            }

        }
        return Command::SUCCESS;
    }
}
