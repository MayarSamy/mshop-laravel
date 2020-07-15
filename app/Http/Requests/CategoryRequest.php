<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!$this->user()->is_admin)
        {
            abort(403);
        }    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =[
            'name'=> 'required'
        ];
        if ($this->input('parent_id'))
        {
            $rules[] ='exists:categories,id';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'parent_id.exists'=> 'Invalid category',
            'name.required'=> 'Enter category name'
        ];
    }
}
