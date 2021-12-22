<?php

namespace App\Providers;

use App\Repository\Contracts\CustomerRepositoryInterface;
use App\Repository\Core\CustomerRepository;
use App\Repository\Contracts\CategoryRepositoryInterface;
use App\Repository\Core\CategoryRepository;
use App\Repository\Contracts\ProductRepositoryInterface;
use App\Repository\Core\ProductRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CustomerRepositoryInterface::class,
            CustomerRepository::class,
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
