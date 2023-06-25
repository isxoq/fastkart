<?php

namespace App\Http\Requests;

use App\Models\TopLabel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTopLabelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('top_label_create');
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
