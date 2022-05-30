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
            
            'title' => 'min:10|max:40',
            'image' => 'image|mimes:jpg,png,jpeg,svg,gif',
            'content' => 'required',
            'category_id' => 'required',
        ];

        if($this->getMethod() == "POST")
        {
            $rules += [
                'title' => 'required|unique:posts|min:10|max:40',
                'image' => 'required|image|mimes:jpg,png,jpeg,svg,gif',
                'content' => 'required',
                'category_id' => 'required',
            ];
        }

        if($this->getMethod() == "PATCH")
        {
            $rules += [
                'title' => 'required|min:10|max:40',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,svg,gif',
                'content' => 'required',
                'category_id' => 'required',
            ];
        }

        return $rules;

    }
}
