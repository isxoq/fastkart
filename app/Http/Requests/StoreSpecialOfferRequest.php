<?php

namespace App\Http\Requests;

use App\Models\SpecialOffer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSpecialOfferRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('special_offer_create');
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
            'url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
