<?php

namespace App\Providers;

use App\Observers\MemberObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Member;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Member::observe(MemberObserver::class);
    }
}
