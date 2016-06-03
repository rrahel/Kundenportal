<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [      
        'App\Bill' => 'App\Policies\BillPolicy',
    	'App\Contract' => 'App\Policies\ContractPolicy',
    	'App\Offer' => 'App\Policies\OfferPolicy',
    	'App\Provisions' =>'App\Policies\ProvisionPolicy'
    ];


    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
