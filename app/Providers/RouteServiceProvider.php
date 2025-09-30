<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->mapApiRoutes();
        
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('v1')
            ->middleware('api')
            ->group(base_path('routes/api.php'));
    }
}
