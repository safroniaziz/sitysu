<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class BladeServiceProvider extends ServiceProvider
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
        Blade::if('hasrole', function ($expression) {
            if (Auth::user()) {
                if (Auth::user()->hak_akses == $expression) {
                    return true;
                } elseif (Auth::user()->hak_akses == 'admin') {
                    return true;
                }
            }
            return false;
        });

        Blade::if('inputsurat', function ($expression) {
            if (Auth::user()) {
                if (Auth::user()->hak_akses == $expression || Auth::user()->hak_akses == 'admin') {
                    if (Auth::user()->input_surat == 'aktif') {
                        return true;
                    }
                    return false;
                }
            }
            return false;
        });
    }
}
