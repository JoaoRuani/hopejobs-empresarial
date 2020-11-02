<?php

namespace App\Providers;

use App\Services\User\UserService;
use App\Brokers\ExternalServices\APIReceitaws\APIReceitaws;
use App\Brokers\ExternalServices\APIReceitaws\APIReceitawsContract;
use App\Brokers\Repositories\Company\CompanyRepository;
use App\Brokers\Repositories\Company\CompanyRepositoryContract;
use App\Brokers\Repositories\User\UserRepository;
use App\Brokers\Repositories\User\UserRepositoryContract;
use App\Services\Company\CompanyService;
use App\Services\Company\CompanyServiceContract;
use App\Services\User\UserServiceContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CompanyRepositoryContract::class, CompanyRepository::class );
        $this->app->bind(CompanyServiceContract::class, CompanyService::class);
        $this->app->singleton(APIReceitawsContract::class, APIReceitaws::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(UserServiceContract::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
