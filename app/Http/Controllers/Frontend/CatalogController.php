<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
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
        return view("frontend.category", compact("category"));
    }


    public function detail(\Illuminate\Support\Facades\Request $request)
    {
        return view("frontend.detail");

    }


}
