<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('ids_existed', function ($attribute, $value, $parameters, $validator) {
            if (empty($value) || !isset($parameters[0]) || !isset($parameters[1])) {
                return false;
            }
//            $value = explode(',', $value);
            $existed = \DB::table($parameters[0])->whereIn($parameters[1], $value)->select('id')->count();

            return $existed == count($value);
        }, trans('validation.string_ids_existed'));

        Validator::extend('phone_format', function ($attribute, $value, $parameters, $validator) {
            return (preg_match('/^[0-9\(\)\+\-\ ]+$/', $value));
        }, trans('validation.phone_format'));

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
