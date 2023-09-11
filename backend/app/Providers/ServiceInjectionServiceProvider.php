<?php

namespace App\Providers;

use App\Service\JournalService;
use App\Service\JournalServiceImpl;
use Illuminate\Support\ServiceProvider;

class ServiceInjectionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JournalService::class, JournalServiceImpl::class);
    }

}
