<?php

namespace App\Http\Requests;

use App\Models\BanneSlider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBanneSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banne_slider_create');
    }

    public function rules()
    {
        return [
            'sort_order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
