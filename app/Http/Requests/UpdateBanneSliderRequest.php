<?php

namespace App\Http\Requests;

use App\Models\BanneSlider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBanneSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banne_slider_edit');
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
            'title_1' => [
                'string',
                'nullable',
            ],
            'title_2' => [
                'string',
                'nullable',
            ],
            'title_3' => [
                'string',
                'nullable',
            ],
            'url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
