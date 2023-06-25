<?php

namespace App\Http\Controllers\Frontend;

use App\Classes\Helper;
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

        return view('frontend.home', compact("categories"));
    }
}
