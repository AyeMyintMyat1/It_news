<?php

namespace App\Http\Controllers;

use App\Rules\IfEmail;
use App\Rules\IfName;
use App\Rules\IfPassword;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function photoEdit(){
        return view('user-profile.photo_edit');
    }
    public function photoUpdate(Request $request){
        $request->validate([
            "photo"=>"required|mimes:png,jpg,jpeg|file|max:2500"
        ]);
        $file = $request->file('photo');
        $dir = "public/profile/";
        $newFileName = uniqid()."_".$file->getClientOriginalName();
       if(Auth::user()->photo != 'user-photo.png'){
           Storage::delete($dir.Auth::user()->photo);
       }
       $img =Image::make($file);
       $img->fit(200,200,null,"top");
       $img->save("square/".$newFileName);
        $img->fit(43,43,null,"center");
        $img->save("small/".$newFileName);
        Storage::putFileAs($dir,$file,$newFileName);
       $user= User::find(Auth::id());
       $user->photo = $newFileName;
       $user->update();

        return redirect()->route('profile.photo.edit');
    }
    public function profilePhoto(){

        return view('user-profile.profilePhoto');
    }
    public function changePassword(){
        return view('user-profile.changePassword');
    }
    public function changePasswordAccount(Request $request){
        $request->validate([
            "current-password"=>["required",new MatchOldPassword()],
            "new_password"=>"required|min:8",
            "confirm-password" =>"required|same:new_password",
            'check' =>"required"
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->update();
       Auth::logout();
        return redirect()->route('login');
    }
    public function changeName(){
        return view('user-profile.changeName');
    }
    public function changeNameAccount(Request $request){
        $request->validate([
            "current-name"=>['required',new IfName()],
            "new_name"=> 'required|min:3',
            "password" =>['required',new IfPassword()],
            'check' =>"required"
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->new_name;
        $user->update();
        return redirect()->route('profile.changeName');
    }
    public function changeEmail(){
        return view('user-profile.changeEmail');
    }
    public function changeEmailAccount(Request $request){
        $request->validate([
            "current-email"=>['required','email:filter',new IfEmail()],
            "new_email"=>"required|email:filter",
            "password"=>['required',new IfPassword()],
            'check'=>'required'
        ]);
        $user = User::find(Auth::id());
        $user->email = $request->new_email;
        $user->update();
       return redirect()->route('profile.changeEmail');
    }
}
