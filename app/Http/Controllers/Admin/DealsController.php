<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDealRequest;
use App\Http\Requests\StoreDealRequest;
use App\Http\Requests\UpdateDealRequest;
use App\Models\Deal;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DealsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('deal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deals = Deal::with(['product'])->get();

        return view('admin.deals.index', compact('deals'));
    }

    public function create()
    {
        abort_if(Gate::denies('deal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.deals.create', compact('products'));
    }

    public function store(StoreDealRequest $request)
    {
        $deal = Deal::create($request->all());

        return redirect()->route('admin.deals.index');
    }

    public function edit(Deal $deal)
    {
        abort_if(Gate::denies('deal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $deal->load('product');

        return view('admin.deals.edit', compact('deal', 'products'));
    }

    public function update(UpdateDealRequest $request, Deal $deal)
    {
        $deal->update($request->all());

        return redirect()->route('admin.deals.index');
    }

    public function show(Deal $deal)
    {
        abort_if(Gate::denies('deal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deal->load('product');

        return view('admin.deals.show', compact('deal'));
    }

    public function destroy(Deal $deal)
    {
        abort_if(Gate::denies('deal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deal->delete();

        return back();
    }

    public function massDestroy(MassDestroyDealRequest $request)
    {
        $deals = Deal::find(request('ids'));

        foreach ($deals as $deal) {
            $deal->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
