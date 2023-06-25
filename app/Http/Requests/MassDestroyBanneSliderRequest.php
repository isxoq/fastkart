<?php

namespace App\Http\Requests;

use App\Models\BanneSlider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBanneSliderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('banne_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:banne_sliders,id',
        ];
    }
}
