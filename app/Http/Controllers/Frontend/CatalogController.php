<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;

class CatalogController extends Controller
{

    public function category(Request $request)
    {
        return view("frontend.category");
    }


    public function detail(\Illuminate\Support\Facades\Request $request)
    {
        return view("frontend.detail");

    }



}
