<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDealTodayRequest;
use App\Http\Requests\StoreDealTodayRequest;
use App\Http\Requests\UpdateDealTodayRequest;
use App\Models\DealToday;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DealTodayController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('deal_today_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealTodays = DealToday::with(['product'])->get();

        return view('admin.dealTodays.index', compact('dealTodays'));
    }

    public function create()
    {
        abort_if(Gate::denies('deal_today_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dealTodays.create', compact('products'));
    }

    public function store(StoreDealTodayRequest $request)
    {
        $dealToday = DealToday::create($request->all());

        return redirect()->route('admin.deal-todays.index');
    }

    public function edit(DealToday $dealToday)
    {
        abort_if(Gate::denies('deal_today_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dealToday->load('product');

        return view('admin.dealTodays.edit', compact('dealToday', 'products'));
    }

    public function update(UpdateDealTodayRequest $request, DealToday $dealToday)
    {
        $dealToday->update($request->all());

        return redirect()->route('admin.deal-todays.index');
    }

    public function show(DealToday $dealToday)
    {
        abort_if(Gate::denies('deal_today_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealToday->load('product');

        return view('admin.dealTodays.show', compact('dealToday'));
    }

    public function destroy(DealToday $dealToday)
    {
        abort_if(Gate::denies('deal_today_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealToday->delete();

        return back();
    }

    public function massDestroy(MassDestroyDealTodayRequest $request)
    {
        $dealTodays = DealToday::find(request('ids'));

        foreach ($dealTodays as $dealToday) {
            $dealToday->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
