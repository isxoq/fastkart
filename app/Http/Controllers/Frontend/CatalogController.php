<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function category(Request $request, $slug)
    {
        $category = Category::findBySlug($slug);
        if (!$category) {
            abort(404);
        }

        $minPrice = $request->input('from') ?? 0;
        $maxPrice = $request->input('to') ?? Product::query()->sum("price");

        $products = $category->products()->whereBetween("products.price", [$minPrice, $maxPrice])->paginate(12);

        return view("frontend.category", compact("category", "products"));
    }


    public function detail(\Illuminate\Support\Facades\Request $request, $slug)
    {
        $product = Product::findBySlug($slug);
        if (!$product) {
            abort(404);
        }

        return view("frontend.detail", compact('product'));

    }

    public function search(Request $request)
    {
        $searchKey = $request->get("q");

        $minPrice = $request->input('from') ?? 0;
        $maxPrice = $request->input('to') ?? Product::query()->sum("price");

        $products = Product::query()
            ->where('code', 'like', '%' . $searchKey . '%')
            ->orWhere('name', 'like', '%' . $searchKey . '%')
            ->orWhere('short_description', 'like', '%' . $searchKey . '%')
            ->orWhere('description', 'like', '%' . $searchKey . '%')
            ->whereBetween("price", [$minPrice, $maxPrice])
            ->paginate(12);
        return view("page.search.results", compact("products"));
    }

}
