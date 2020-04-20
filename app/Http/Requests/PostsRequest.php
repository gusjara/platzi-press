<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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

    //rules
    public function rules()
    {
        // dd($this->method());
        if ($this->method() == 'PATCH'){
            return [
                ////'titulo' => 'required|min:3|unique:noticias,titulo,'.$id.',id',
                'title' => 'required|min:3|unique:posts,title,'.$this->post->id,
                'body' => 'required|min:10'
            ];
        }
        return [
            ////'titulo' => 'required|min:3|unique:noticias,titulo,'.$id.',id',
            'title' => 'required|min:3|unique:posts,title',
            'body' => 'required|min:10'
        ];
    }

    // messages
    public function messages(){
        return [
            'title.required'    =>  'The :attribute is required',
            'title.unique'    =>  'The :attribute is already in use',
            'title.min'    =>  'The :attribute must have at least 3 characters',
            'body.required'      =>  'The :attribute required',
            'body.min'      =>  'The :attribute must have more than 10 characters',
        ];
    }

    // rename attributes
    public function attributes(){
        return [
            'title'      => 'TITLE',
            'body'   => 'BODY',
        ];
    }
}
