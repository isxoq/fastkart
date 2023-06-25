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
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogs = Blog::with(['media'])->get();

        return view('frontend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        abort_if(Gate::denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.blogs.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create($request->all());

        if ($request->input('card_photo', false)) {
            $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('card_photo'))))->toMediaCollection('card_photo');
        }

        if ($request->input('photo', false)) {
            $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $blog->id]);
        }

        return redirect()->route('frontend.blogs.index');
    }

    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.blogs.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());

        if ($request->input('card_photo', false)) {
            if (! $blog->card_photo || $request->input('card_photo') !== $blog->card_photo->file_name) {
                if ($blog->card_photo) {
                    $blog->card_photo->delete();
                }
                $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('card_photo'))))->toMediaCollection('card_photo');
            }
        } elseif ($blog->card_photo) {
            $blog->card_photo->delete();
        }

        if ($request->input('photo', false)) {
            if (! $blog->photo || $request->input('photo') !== $blog->photo->file_name) {
                if ($blog->photo) {
                    $blog->photo->delete();
                }
                $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($blog->photo) {
            $blog->photo->delete();
        }

        return redirect()->route('frontend.blogs.index');
    }

    public function show(Blog $blog)
    {
        abort_if(Gate::denies('blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.blogs.show', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogRequest $request)
    {
        $blogs = Blog::find(request('ids'));

        foreach ($blogs as $blog) {
            $blog->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('blog_create') && Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Blog();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
