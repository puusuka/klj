<?php

namespace App\Http\Requests;
// 

use Illuminate\Foundation\Http\FormRequest;


class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // if ($this->path() == '/todo/update') {
      return true;
    } //else {
      //return false;
    //}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             
               
              'name' => 'required|max:20',
              
        ];
    }
     public function messages()
  {
    return [
      
       'name.max'  => 'タスクは20文字以内で入力してください。',
       'name.required' => 'タスクを入力してください。',

      
    ];
  }
 }

