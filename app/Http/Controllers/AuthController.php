<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('backend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->only('email', 'password');


        if (Auth::attempt($data)) {
            toastr()->success('Login Success !');
            return redirect()->route('notes.index');
        } else {
            dd('chuc ban may man lan sau ');
        }
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function showFormRegister()
    {
        return view('backend.auth.register');

    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($request->password);
        $user = User::query()->create($data);
        toastr()->success('Register Success !');
        return redirect()->route('admin.login');
    }
}
