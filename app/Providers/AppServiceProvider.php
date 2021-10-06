<?php

namespace App\Providers;

use App\MegaMenu;
use App\AppSettingsModel;
use App\Observers\ApsettingObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        AppSettingsModel::observe(ApsettingObserver::class);
        view()->composer([
            'frontend.layouts.app_baner',
            'frontend.layouts.app_services',
            'frontend.layouts.app_delivery_counting',
            'frontend.layouts.app_header',
            'admin.booking_details.index',
            'admin.merchant-booking-list.list',
            'print',
            'merchant-print',
            'admin.payment-list.reseller-payment-list',
            'admin.payment-list.merchant-payment-list',
            'payment-history-print.reseller-history-print',
            'payment-history-print.merchant-history-print',
            'layouts.app_css',
            'frontend.layouts.app'
        ], function ($view) {
            $view->with('appsetting', Cache::rememberForever('appsetting', function () {
                return AppSettingsModel::first();
            }));
        });


        // View::share('megaMenuems', MegaMenu::where('status', 1)->get());
        view()->share('megaMenuItems', MegaMenu::where('status', 1)->get());
    }
}
