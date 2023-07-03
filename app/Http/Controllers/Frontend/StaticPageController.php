<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStaticPageRequest;
use App\Http\Requests\StoreStaticPageRequest;
use App\Http\Requests\UpdateStaticPageRequest;
use App\Models\StaticPage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StaticPageController extends Controller
{
    public function aboutUs(Request $request)
    {
        return view("page.static.about");
    }

    public function contactUs(Request $request)
    {
        return view("page.static.contact");
    }
}
