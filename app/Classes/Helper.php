<?php

namespace App\Classes;

use Carbon\Carbon;

class Helper
{

    public static function cacheTime($minutes = null): Carbon
    {
        return Carbon::now()->addMinutes($minutes ?? config("cache_minutes"));
    }

}
