<?php

namespace App\Http\Requests;

use App\Models\DealToday;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDealTodayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('deal_today_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'color' => [
                'string',
                'nullable',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
