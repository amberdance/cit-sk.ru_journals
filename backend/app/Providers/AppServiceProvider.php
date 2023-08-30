<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        DB::listen(function ($query) {
            Log::debug(
                $query->sql,
                [
                    'bindings' => $query->bindings,
                    'time'     => $query->time
                ]
            );
        });
    }
}
