<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBlogRequest;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $blogs = Blog::query()
            ->orderBy("start")
            ->paginate(12);

        $recentPosts = Blog::query()
            ->latest()->limit(5)->get();

        return view('page.blog.index', compact("blogs", "recentPosts"));
    }

    public function detail(Request $request, $slug)
    {

        $blog = Blog::findBySlug($slug);
        if (!$blog) {
            abort(404);
        }
        return view("page.blog.detail", compact("blog"));
    }
}
