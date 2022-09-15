<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Registering Interface and Repository
        $this->app->bind(
            'App\Interfaces\StudentInterface',
            'App\Repositories\StudentRepository'
        );
    }
}
