<?php

namespace App\Providers;

use App\Repository\AttackerRepository;
use App\Repository\AttackerRepositoryImpl;
use App\Repository\JournalRepository;
use App\Repository\JournalRepositoryImpl;
use App\Repository\VictimRepository;
use App\Repository\VictimRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryInjectionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JournalRepository::class, JournalRepositoryImpl::class);
        $this->app->bind(VictimRepository::class, VictimRepositoryImpl::class);
        $this->app->bind(AttackerRepository::class, AttackerRepositoryImpl::class);
    }

}
