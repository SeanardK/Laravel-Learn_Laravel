<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login(): View
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('auth.login');
        }
    }

    public function register(Request $request): View
    {
        return view("auth.register");
    }

    public function registerAction(Request $request)
    {
        $this->validate($request, [
            "name" => "required|min:3",
            "password" => "required|min:6",
            "email" => "required|email|unique:users"
        ]);

        $data = [
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password"))
        ];

        User::create($data);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        $request->session()->regenerate();
        return redirect()->route('home')
            ->withSuccess('You have successfully registered!');
    }

    public function actionLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'message' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

        // $data = [
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password'),
        // ];

        // return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
