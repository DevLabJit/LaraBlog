<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules =  [
            
            'title' => 'required|unique:posts|min:40|max:250',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg,gif',
            'content' => 'required',
            'category_id' => 'required',
        ];

        if($this->getMethod() == "POST")
        {
            $rules = [
                'title' => 'required|unique:posts|min:40|max:250',
                'image' => 'required|image|mimes:jpg,png,jpeg,svg,gif',
                'content' => 'required',
                'category_id' => 'required',
            ];
        }

        return $rules;

    }
}
