<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


    public  function  index()
    {

        return view('profile.index');
    }


    public  function Update(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',


        ]);
        $id = Auth::user()->id;

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);
        return Redirect()->back()->with('success','Proflie  Updated');



    }


    // Password
    public  function Password()
    {

        return view('profile.password');

    }


    //Update PW

    public  function PasswordUpdate(Request $request)
    {

        $id = Auth::user()->id;
        $db_pass = Auth::user()->password;
        $old_pass = $request->old_password;
        $new_pass = $request->new_password;
        $confirm_pass = $request->confirm_password;

        if(Hash::check($old_pass, $db_pass)){

            if($new_pass === $confirm_pass){

                User::find($id)->update([
                    'password' => Hash::make($request->new_password)

                ]);
                Auth::logout();
                return Redirect()->route('login');

            }else{
                return Redirect()->back()->with('danger','new password and confirm passoword not same');

            }



        }else{
            return Redirect()->back()->with('error','old Passowrd Not match');
        }



    }




}
