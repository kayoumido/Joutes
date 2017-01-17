<?php

namespace App\Providers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiServiceProvider extends RouteServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //change the not found model exception to a symfony exception (dingo handles only symfony... )
        app('Dingo\Api\Exception\Handler')->register(function (ModelNotFoundException $exception) {
            throw new NotFoundHttpException($exception->getMessage() ,$previous = $exception);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
