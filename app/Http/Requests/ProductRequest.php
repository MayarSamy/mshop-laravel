<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =[
            'name'=> 'required',
            'price'=> 'required',
            'quantity'=> 'required',
        ];
        if ($this->input('category_id'))
        {
            $rules[] ='exists:categories,id';
        }
        else
        {
            $rules[] ='required';
        }
        if ($this->input('user_id'))
        {
            $rules[] ='exists:users,id';
        }
        return $rules;
    }
}
