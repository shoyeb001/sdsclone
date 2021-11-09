<?php

namespace App\Providers;

use App;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Schema;

class CustomServiceProvider extends ServiceProvider
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
    public function boot()
    {
        try {
            if(Schema::hasTable('general_setting')) {
                $generalSetting = GeneralSetting::first();
                if(isset($generalSetting->id)) {
                    if(isset($generalSetting->company_name)){
                        Config::set('app.company_name', $generalSetting->company_name);
                    }
                    if(isset($generalSetting->company_logo)){
                        Config::set('app.company_logo', $generalSetting->company_logo);
                    }
                    if(isset($generalSetting->email)){
                        Config::set('app.email', $generalSetting->email);
                    }
                    if(isset($generalSetting->phone)){
                        Config::set('app.phone', $generalSetting->phone);
                    }
                }
            }

            // dd(config('app'));

        }catch (\Exception $e) {

        }
    }
}
