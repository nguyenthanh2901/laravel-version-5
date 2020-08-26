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
            'email.required'=>'Trường này không được để trống',
            'email.unique'=> 'Email này đã được đăng ký tài khoản trước đó',
            'phone.required'=>'Trường này không được để trống',
            'password.required'=>'Trường này không được để trống',
            'name.required'=>'Trường này không được để trống',
            


        ];
    }
}
