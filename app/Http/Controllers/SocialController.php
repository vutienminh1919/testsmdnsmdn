<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator, Illuminate\Support\Facades\Redirect, Illuminate\Support\Facades\Response, Illuminate\Support\Facades\File;


class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();
//        dd($getInfo);

        $user = $this->findOrCreateUser($getInfo, $provider);

        auth()->login($user);
        toastr()->success("Login by $provider Success !");
        return redirect()->route('users.index');

    }

    function findOrCreateUser($getInfo, $provider)
    {

//        $user = User::where('provider_id', $getInfo->id)->first();
        $user = User::where('email', $getInfo->email)->first();
//        dd($user);
        if (!$user) {
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'avatar' => $getInfo->avatar,
                'provider' => $provider,
                'provider_id' => $getInfo->id

            ]);
        } else {
            $user->update([
                'name' => $getInfo->name,
                'avatar' => $getInfo->avatar,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;

//        if (!$user) {
//            $user = User::create([
//                'name'     => $getInfo->name,
//                'email'    => $getInfo->email,
//                'provider' => $provider,
//                'provider_id' => $getInfo->id
//            ]);
//        }
//        return $user;
    }
}
