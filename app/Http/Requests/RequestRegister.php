<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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

    
   public function rules()
    {
        return [
            'email'=>'required|unique:users,email,'.$this->id,
            'name'=>'required',
            'phone'=>'required',
            'password'=>'required',
            


        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Not Null',
            'email.unique'=> 'Email existed',
            'phone.required'=>'Not Null',
            'password.required'=>'Not Null',
            'name.required'=>'Not Null',
            


        ];
    }
}
