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
                "title" => "Bosh sahifa",
                "url" => url("/")
            ],
            [
                "title" => "Bizning blog",
                "url" => url("/blog")
            ],
            [
                "title" => "Biz haqimizda",
                "url" => url("/about-us")
            ],
            [
                "title" => "Biz bilan bog'lanish",
                "url" => url("/contact-us")
            ],
        ];
    }

    public static function info($key)
    {
        $params = [
            "phone1" => "+998 55 503 34 24",
            "phone2" => "+998 94 585 34 24",
            "phone3" => "(55) 503 34 24",
            "email" => "harir.brend@gmail.com",
            "address1" => "Toshkent shahar Mannon uyg’ur ko’chasi 307-uy",
            "address2" => "Abu saxiy savdo markazi Q-11 L-23 do'kon",
            "yandex1" => "https://yandex.com/maps/org/60151128030",
            "yandex2" => "https://maps.app.goo.gl/3ug3ZA8jYibY1NFUA"
        ];

        return $params[$key];
    }

}
