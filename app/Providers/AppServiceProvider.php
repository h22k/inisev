<?php

namespace App\Providers;

use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\WebsiteServiceInterface;
use App\Services\UserServices;
use App\Services\WebsiteServices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $services = [
            UserServiceInterface::class    => UserServices::class,
            WebsiteServiceInterface::class => WebsiteServices::class
        ];

        foreach ($services as $interface => $service) {
            \App::bind($interface, $service);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        \Cache::forever('publishedPost', []);
    }
}
