<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class SearchHelper
{
    public static function search()
    {
        return substr(Route::currentRouteName(), 0, strripos(Route::currentRouteName(), '.')) . '.index';
    }
}
