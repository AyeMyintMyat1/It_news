<?php

namespace App\Http\Controllers;

use App\Rules\IfPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{
    public function  redirect(){
    return Socialite::driver('facebook')->redirect();
    }

    public function  callback(Request $request){
        $request->validate([
            "password"=>"required"
        ]);

        $socialite = Socialite::driver('facebook')->stateless()->user();
//        dd($socialite);
        $isUser=User::where('facebook_id',$socialite->id)->first();
        if(isset($isUser)){
            Auth::login($isUser);
        }else{
            $user = new User();
            $user->name = $socialite->name;
            if(isset($socialite->email)){
                $user->email = $socialite->email;
            }
            $user->password = Hash::make($request->password);
            $user->photo = $socialite->avatar;
            $user->facebook_id = $socialite->id;
            $user->save();
            Auth::login($user);
        }
        return redirect()->route('home');

    }
    public function password(){
        return view('fb.password');
    }
//    public function passwordAccount(Request $request){
//        $request->validate([
//            "password"=>"required"
//        ]);
//        $password = $request->password;
//        return redirect()->route('fb.callback');
//    }
}
