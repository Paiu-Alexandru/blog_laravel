<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class Profile extends Controller
{
    public function changePass()
    {
      return view('admin.user.change_password');
    }

    public function updatePass(Request $request)
    {
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashPassword = Auth::user()->password; //Take value from DB

        if(Hash::check( $request->oldpassword, $hashPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success', 'Password was changed.');
        }else {
            return redirect()->back()->with('error', 'Some error was found');
        }
    }

    public function userProfile()
    {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.user.update_profile', compact('user'));
            }
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'image' =>'mimes:jpg,png,jpeg'
        ],[
            'brand_img.mimes' => 'Only .jpg .png .jpeg extension accepted'
        ]);
        $user = User::find(Auth::user()->id);
        if ( $user) {
                if ($user->name != $request['name']) {
                    $user->name = $request['name'];
                    $user->save();

                    return redirect()->back()->with('success', 'Profile Name Updated');
                }
                if ($user->email != $request['email']) {
                    $user->email = $request['email'];
                    $user->save();
                    return redirect()->back()->with('success', 'Profile Email Updated');
                }


                $image = $request->file('image');
                if(isset($image)){
                    if($user->profile_photo_path != NULL){
                    $unlink = unlink($user->profile_photo_path);
                    }

                    $lowerCase_extention = strtolower($image->getClientOriginalExtension());
                    $generate_name = hexdec(uniqid()).'.'.$lowerCase_extention;
                    Image::make($image)->resize(150,150)->save('images/profileImg/'.$generate_name);

                    $db_image_name = 'images/profileImg/'.$generate_name;

                    $user->profile_photo_path = $db_image_name;
                    $user->save();

                    return redirect()->back()->with('success','Profile Image Updated.');
                }

                return redirect()->back()->with('success', 'Nothing to update.');
        }
    }

}
