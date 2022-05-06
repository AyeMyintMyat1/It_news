<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function  redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function  callback(){

        $socialite = Socialite::driver('google')->stateless()->user();
//        dd($socialite);
        $isUser=User::where('google_id',$socialite->id)->first();
        if(isset($isUser)){
            Auth::login($isUser);
        }else{
            $user = new User();
            $user->name = $socialite->name;
            if(isset($socialite->email)){
                $user->email = $socialite->email;
            }
            $user->password = Hash::make(123456);
//            $user->photo = $socialite->avator;
            $user->google_id = $socialite->id;
            $user->save();
            Auth::login($user);
        }
        return redirect()->route('home');

    }
//    public function password(){
//        return view('google.password');
//    }
}
