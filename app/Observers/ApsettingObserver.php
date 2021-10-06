<?php

namespace App\Observers;

use App\AppSettingsModel;
use Illuminate\Support\Facades\Cache;

class ApsettingObserver
{
    /**
     * Handle the app settings model "created" event.
     *
     * @param  \App\AppSettingsModel  $appSettingsModel
     * @return void
     */
    public function created(AppSettingsModel $appSettingsModel)
    {
        //
    }

    /**
     * Handle the app settings model "updated" event.
     *
     * @param  \App\AppSettingsModel  $appSettingsModel
     * @return void
     */
    public function updated(AppSettingsModel $appSettingsModel)
    {
        Cache::forget('appsetting');
    }

    /**
     * Handle the app settings model "deleted" event.
     *
     * @param  \App\AppSettingsModel  $appSettingsModel
     * @return void
     */
    public function deleted(AppSettingsModel $appSettingsModel)
    {
        //
    }

    /**
     * Handle the app settings model "restored" event.
     *
     * @param  \App\AppSettingsModel  $appSettingsModel
     * @return void
     */
    public function restored(AppSettingsModel $appSettingsModel)
    {
        //
    }

    /**
     * Handle the app settings model "force deleted" event.
     *
     * @param  \App\AppSettingsModel  $appSettingsModel
     * @return void
     */
    public function forceDeleted(AppSettingsModel $appSettingsModel)
    {
        //
    }
}
