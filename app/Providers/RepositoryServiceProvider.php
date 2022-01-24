<?php

namespace App\Providers;



use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\Dto\CurrencyRepository;
use Illuminate\Support\ServiceProvider;

/** 
* Class RepositoryServiceProvider 
* @package App\Providers 
*/ 

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);

    }

}
