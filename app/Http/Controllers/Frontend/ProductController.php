<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    public function detail(Request $request)
    {
        return view("frontend.detail");

    }
}
