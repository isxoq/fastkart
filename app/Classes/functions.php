<?php

if (!function_exists("trendingProducts")) {
    function trendingProducts()
    {
        return \App\Models\Product::query()->where('is_trend', 1)->limit(6)->latest()->get();
    }
}

if (!function_exists("dealsToday")) {
    function dealsToday()
    {
        return \App\Models\DealToday::query()->orderBy("sort_order")->get();
    }
}
