<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->put('user_id', $user->id);
            return redirect()->route('main');
        }

        $errors = [];
        if (!$user) {
            $errors['username'] = 'Неправильный логин.';
        } elseif (!Hash::check($credentials['password'], $user->password)) {
            $errors['password'] = 'Неправильный пароль.';
        }

        return back()->withErrors($errors)->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect()->route('main');
    }
}
