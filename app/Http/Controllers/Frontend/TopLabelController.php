<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTopLabelRequest;
use App\Http\Requests\StoreTopLabelRequest;
use App\Http\Requests\UpdateTopLabelRequest;
use App\Models\TopLabel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopLabelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('top_label_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topLabels = TopLabel::all();

        return view('frontend.topLabels.index', compact('topLabels'));
    }

    public function create()
    {
        abort_if(Gate::denies('top_label_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.topLabels.create');
    }

    public function store(StoreTopLabelRequest $request)
    {
        $topLabel = TopLabel::create($request->all());

        return redirect()->route('frontend.top-labels.index');
    }

    public function edit(TopLabel $topLabel)
    {
        abort_if(Gate::denies('top_label_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.topLabels.edit', compact('topLabel'));
    }

    public function update(UpdateTopLabelRequest $request, TopLabel $topLabel)
    {
        $topLabel->update($request->all());

        return redirect()->route('frontend.top-labels.index');
    }

    public function show(TopLabel $topLabel)
    {
        abort_if(Gate::denies('top_label_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.topLabels.show', compact('topLabel'));
    }

    public function destroy(TopLabel $topLabel)
    {
        abort_if(Gate::denies('top_label_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topLabel->delete();

        return back();
    }

    public function massDestroy(MassDestroyTopLabelRequest $request)
    {
        $topLabels = TopLabel::find(request('ids'));

        foreach ($topLabels as $topLabel) {
            $topLabel->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
