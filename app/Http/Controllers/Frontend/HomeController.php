<?php

namespace App\Http\Controllers\Frontend;

use App\Classes\Helper;
use App\Models\Banner;
use App\Models\BanneSlider;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class HomeController
{
    public function index()
    {


        $categories = Cache::remember('categories', Helper::cacheTime(), function () {
            return Category::query()
                ->where('status', 1)
                ->get();
        });

        $bigBanner = Cache::remember('bigBanner', Helper::cacheTime(), function () {
            return Banner::query()
                ->where('type', 'big')
                ->first();
        });
        $smallBanners = Cache::remember('smallBanners', Helper::cacheTime(), function () {
            return Banner::query()
                ->where('type', 'small')
                ->limit(2)
                ->get();
        });

        $bannerSlider = Cache::remember('bannerSlider', Helper::cacheTime(), function () {
            return BanneSlider::query()
                ->orderBy('sort_order')
                ->get();
        });

        return view('frontend.home', compact(
            "categories",
            "bigBanner",
            "smallBanners",
            "bannerSlider"));
    }
}
