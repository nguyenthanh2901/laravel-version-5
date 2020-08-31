<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(RequestRegister $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->save();

        if ($user->id)
        {
            return redirect()->route('get.login')->with('success','Tạo tài khoản thành công. Xin mời đăng nhập!');
        }
        else redirect()->back();
    }

}
