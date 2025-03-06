<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Services\SettingsService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\TestimonialRepository;
use App\Repositories\TestimonialRepositoryInterface;
use App\Repositories\AboutusRepository;
use App\Repositories\AboutusRepositoryInterface;
use App\Repositories\TeamMemberRepository;
use App\Repositories\TeamMemberRepositoryInterface;
use App\Repositories\ContactUsRepository;
use App\Repositories\ContactUsRepositoryInterface;
use App\Repositories\SettingsRepositoryInterface;
use App\Repositories\SettingsRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ServiceRepositoryInterface;
use App\Repositories\ServiceRepository;
use App\Repositories\PortfolioRepositoryInterface;
use App\Repositories\PortfolioRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);
        $this->app->bind(AboutusRepositoryInterface::class, AboutusRepository::class);
        $this->app->bind(TeamMemberRepositoryInterface::class, TeamMemberRepository::class);
        $this->app->bind(ContactUsRepositoryInterface::class, ContactUsRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(PortfolioRepositoryInterface::class, PortfolioRepository::class);





    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $settingsService = app(SettingsService::class);
            $settings = $settingsService->getAllSettings();
            $view->with('settings', $settings);
        });
    }
}
