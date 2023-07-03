<?php

namespace App\Classes;

use Carbon\Carbon;

class Helper
{

    public static function cacheTime($minutes = null): Carbon
    {
        return Carbon::now()->addMinutes($minutes ?? config("cache_minutes"));
    }


    public static function getMenu()
    {
        return [
            [
                "title"=>"Bosh sahifa",
                "url"=>url("/")
            ],
            [
                "title"=>"Bizning blog",
                "url"=>url("/blog")
            ],
            [
                "title"=>"Biz haqimizda",
                "url"=>url("/about-us")
            ],
            [
                "title"=>"Biz bilan bog'lanish",
                "url"=>url("/contact-us")
            ],
        ];
    }

}
