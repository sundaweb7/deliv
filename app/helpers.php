<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('safe_route')) {
    function safe_route(string $name, $parameters = [], $absolute = true)
    {
        if (Route::has($name)) {
            return route($name, $parameters, $absolute);
        }

        return 'javascript:void(0);';
    }
}
