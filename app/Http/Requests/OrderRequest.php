<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id'=> 'required|exists:customers,id',
            'date'=> 'required|date',
            'products'=> 'required|array|min:1',
            'products.*.quantity'=>'required|numeric|min:1',
            'products.*.product_id'=>'required|exists:products,id',
            'products.*.price'=>'required|numeric',
            'products.*.total'=>'required|numeric',
        ];
    }

}
