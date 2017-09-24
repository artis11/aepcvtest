<?php namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->app['validator']->extend('blocked_email', function ($attribute, $value, $parameters)
        {
            if (DB::table('blocked_emails')->where('email', $value)->exists()) {
                return false;
            }
            return true;
        });
    }

    public function register()
    {
        //
    }
}