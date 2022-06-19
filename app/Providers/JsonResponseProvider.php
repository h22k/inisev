<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\ServiceProvider;

class JsonResponseProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        JsonResponse::macro('success', static function (iterable $data, int $status = 200) {
            $response = \success($data, $status);

            return response()->json($response, $status);
        });

        JsonResponse::macro('error', static function (iterable $error, int $status = 200) {
            $errData = \error($error, $status);
            return \response()->json($errData, $status);
        });
    }
}
