<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CustomDateValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Validator::extend('date_not_past', function ($attribute, $value, $parameters, $validator) {
            // Check if the date is not in the past
            return strtotime($value) >= strtotime('today');
        });

        Validator::extend('date_between', function ($attribute, $value, $parameters, $validator) {
            // Check if the date is within the specified range
            $minDate = $validator->getData()[$parameters[0]];
            $maxDate = $validator->getData()[$parameters[1]];

            return strtotime($value) >= strtotime($minDate) && strtotime($value) <= strtotime($maxDate);
        });

        Validator::extend('date_not_past_than_double_dustur', function ($attribute, $value, $parameters, $validator) {
            // Check if the date is not in the past
            $minDate = $validator->getData()[$parameters[0]];
            return strtotime($value) >= strtotime($minDate);
        });
    }
}
