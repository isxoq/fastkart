<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::with(['parent', 'media'])->get();

        return view('frontend.categories.index', compact('categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.categories.create', compact('parents'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());

        if ($request->input('icon', false)) {
            $category->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $category->id]);
        }

        return redirect()->route('frontend.categories.index');
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $category->load('parent');

        return view('frontend.categories.edit', compact('category', 'parents'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        if ($request->input('icon', false)) {
            if (! $category->icon || $request->input('icon') !== $category->icon->file_name) {
                if ($category->icon) {
                    $category->icon->delete();
                }
                $category->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($category->icon) {
            $category->icon->delete();
        }

        return redirect()->route('frontend.categories.index');
    }

    public function show(Category $category)
    {
        abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->load('parent', 'parentCategories');

        return view('frontend.categories.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        $categories = Category::find(request('ids'));

        foreach ($categories as $category) {
            $category->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('category_create') && Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Category();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
