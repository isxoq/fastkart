<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;

class CatalogController extends Controller
{

    public function category(Request $request, $slug)
    {
        $category = Category::findBySlug($slug);
        if (!$category) {
            abort(404);
        }

        $products = $category->products()->paginate(12);
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


}
