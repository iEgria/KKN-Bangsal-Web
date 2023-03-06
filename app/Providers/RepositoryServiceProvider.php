<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(\App\Interfaces\GeneralInformationRepository::class, \App\Repositories\GeneralInformationRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\SliderRepository::class, \App\Repositories\SliderRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\RelatedLinkRepository::class, \App\Repositories\RelatedLinkRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\GaleryRepository::class, \App\Repositories\GaleryRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\RtRwRepository::class, \App\Repositories\RtRwRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\SejarahDesaRepository::class, \App\Repositories\SejarahDesaRepositoryEloquent::class);
        //:end-bindings:
    }
}
