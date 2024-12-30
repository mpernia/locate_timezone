<?php

namespace Src\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Noncompliant - method is empty
    }

    public function boot(): void
    {
        $this->loadTranslationsFrom(base_path('src/Shared/Infrastructure/Resources/lang'), 'app');
    }
}
