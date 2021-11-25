<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->withErrors('email veya şifre hatalı');
    }

    public function registerPost(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
//            'role' =>$request->role,
        ]);



        auth()->login($user);


//        return redirect()->to('/home')->with("kayıt oluşturkuldu");
        return redirect('profile')->with('success-message', 'Kayıt başarıyla gerçekleşti ve oturum açıldı.');

    }

    public function logout(){
        Auth::logout();

        return view("home");
    }
}
