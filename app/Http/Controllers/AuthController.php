<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function auth_login(Request $request){
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        
        $data = User::where('email', $request->email)->select('id','name','email','password')->first();

        if($data){
            if (Hash::check($request->input('password'), $data->password)) {
                session()->put('id',$data->id);
                session()->put('name',$data->name);
                session()->put('email',$data->email);
                return redirect()->route('home');
            }else {
                return redirect()->back()->with('error', 'Email and Password Not Match!');   
            }
        }else{
            return redirect()->back()->with('error', 'Email and Password Not Match!');   
        }
    }

    public function auth_register(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'referral_code' => 'required|string',
        ]);

        
        $referralCode = $request->input('referral_code');

        if ($referralCode) {
            $referringUser = User::where('referral_code', $referralCode)->latest()->first();

            if ($referringUser) {
                if ($referringUser->referral_count < 5) {

                    $user = new User();
                    $user->name                 = $request->name;
                    $user->username             = $request->username;
                    $user->phone                = $request->phone;
                    $user->email                = $request->email;
                    $user->password             = $request->password;
                    $user->referring_user_id    = $referringUser->id;
                    $user->referral_code        = 'ref-'.explode('-',User::latest()->first()->referral_code)[1] + 1;
                    $user->referral_percentage  = $referringUser->referral_count == 4 ? 15 : 8;
                    $user->save();
                    
                    $referringUser->referral_count      = $referringUser->referral_count == 0 ? 1 : $referringUser->referral_count +1;
                    $referringUser->save();

                    if($user){
                        return redirect()->route('login');
                    }else{
                        return redirect()->back()->with('error','Registation not Success');
                    }
                }else {
                    return redirect()->back()->with('error','Already this Referral Code 5 member registed!');
                }
            }else {
                return redirect()->back()->with('error','This Referral Code NOT Match!');
            }
        }
    }

    public function logout(){
        session()->remove('id');
        session()->remove('name');
        session()->remove('email');
        return redirect()->route('home');
    }
}
