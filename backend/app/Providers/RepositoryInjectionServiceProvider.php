<?php

namespace App\Providers;

use App\Repository\JournalRepository;
use App\Repository\JournalRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryInjectionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JournalRepository::class, JournalRepositoryImpl::class);
    }

}
