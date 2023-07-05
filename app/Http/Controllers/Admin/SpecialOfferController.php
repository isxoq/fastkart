<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySpecialOfferRequest;
use App\Http\Requests\StoreSpecialOfferRequest;
use App\Http\Requests\UpdateSpecialOfferRequest;
use App\Models\Offer;
use App\Models\SpecialOffer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SpecialOfferController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('special_offer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialOffers = SpecialOffer::with(['offer', 'media'])->get();

        return view('admin.specialOffers.index', compact('specialOffers'));
    }

    public function create()
    {
        abort_if(Gate::denies('special_offer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offers = Offer::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.specialOffers.create', compact('offers'));
    }

    public function store(StoreSpecialOfferRequest $request)
    {
        $specialOffer = SpecialOffer::create($request->all());

        if ($request->input('photo', false)) {
            $specialOffer->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $specialOffer->id]);
        }

        return redirect()->route('admin.special-offers.index');
    }

    public function edit(SpecialOffer $specialOffer)
    {
        abort_if(Gate::denies('special_offer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offers = Offer::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialOffer->load('offer');

        return view('admin.specialOffers.edit', compact('offers', 'specialOffer'));
    }

    public function update(UpdateSpecialOfferRequest $request, SpecialOffer $specialOffer)
    {
        $specialOffer->update($request->all());

        if ($request->input('photo', false)) {
            if (! $specialOffer->photo || $request->input('photo') !== $specialOffer->photo->file_name) {
                if ($specialOffer->photo) {
                    $specialOffer->photo->delete();
                }
                $specialOffer->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($specialOffer->photo) {
            $specialOffer->photo->delete();
        }

        return redirect()->route('admin.special-offers.index');
    }

    public function show(SpecialOffer $specialOffer)
    {
        abort_if(Gate::denies('special_offer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialOffer->load('offer');

        return view('admin.specialOffers.show', compact('specialOffer'));
    }

    public function destroy(SpecialOffer $specialOffer)
    {
        abort_if(Gate::denies('special_offer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialOffer->delete();

        return back();
    }

    public function massDestroy(MassDestroySpecialOfferRequest $request)
    {
        $specialOffers = SpecialOffer::find(request('ids'));

        foreach ($specialOffers as $specialOffer) {
            $specialOffer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('special_offer_create') && Gate::denies('special_offer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SpecialOffer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
