<?php

namespace App\Http\Requests;

use App\Models\Deal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDealRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('deal_create');
    }

    public function rules()
    {
        return [
            'begin' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'end' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
