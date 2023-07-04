<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBanneSliderRequest;
use App\Http\Requests\StoreBanneSliderRequest;
use App\Http\Requests\UpdateBanneSliderRequest;
use App\Models\BanneSlider;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BanneSliderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('banne_slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banneSliders = BanneSlider::with(['media'])->get();

        return view('admin.banneSliders.index', compact('banneSliders'));
    }

    public function create()
    {
        abort_if(Gate::denies('banne_slider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banneSliders.create');
    }

    public function store(StoreBanneSliderRequest $request)
    {
        $banneSlider = BanneSlider::create($request->all());

        if ($request->input('photo', false)) {
            $banneSlider->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $banneSlider->id]);
        }

        return redirect()->route('admin.banne-sliders.index');
    }

    public function edit(BanneSlider $banneSlider)
    {
        abort_if(Gate::denies('banne_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banneSliders.edit', compact('banneSlider'));
    }

    public function update(UpdateBanneSliderRequest $request, BanneSlider $banneSlider)
    {
        $banneSlider->update($request->all());

        if ($request->input('photo', false)) {
            if (! $banneSlider->photo || $request->input('photo') !== $banneSlider->photo->file_name) {
                if ($banneSlider->photo) {
                    $banneSlider->photo->delete();
                }
                $banneSlider->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($banneSlider->photo) {
            $banneSlider->photo->delete();
        }

        return redirect()->route('admin.banne-sliders.index');
    }

    public function show(BanneSlider $banneSlider)
    {
        abort_if(Gate::denies('banne_slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banneSliders.show', compact('banneSlider'));
    }

    public function destroy(BanneSlider $banneSlider)
    {
        abort_if(Gate::denies('banne_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banneSlider->delete();

        return back();
    }

    public function massDestroy(MassDestroyBanneSliderRequest $request)
    {
        $banneSliders = BanneSlider::find(request('ids'));

        foreach ($banneSliders as $banneSlider) {
            $banneSlider->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('banne_slider_create') && Gate::denies('banne_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BanneSlider();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
