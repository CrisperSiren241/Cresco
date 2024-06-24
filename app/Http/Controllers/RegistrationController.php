<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        if ($request->ajax()) {
            $fieldToValidate = $request->input('fieldToValidate');

            $errors = [];

            if ($fieldToValidate === 'username') {
                if (empty($request->input('username'))) {
                    $errors['usernameError'] = 'Поле имя пользователя обязательно для заполнения.';
                } elseif (strlen($request->input('username')) > 255) {
                    $errors['usernameError'] = 'Поле имя пользователя не должно превышать 255 символов.';
                }
                elseif (User::where('username', $request->input('username'))->exists()) {
                    $errors['usernameError'] = 'Данное имя уже занято.';
                }
            } elseif ($fieldToValidate === 'email') {
                if (empty($request->input('email'))) {
                    $errors['emailError'] = 'Поле электронная почта обязательно для заполнения.';
                } elseif (!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
                    $errors['emailError'] = 'Поле электронная почта должно быть действительным адресом электронной почты.';
                } elseif (User::where('email', $request->input('email'))->exists()) {
                    $errors['emailError'] = 'Данная электронная почта уже занята.';
                }
            } elseif ($fieldToValidate === 'password' || $fieldToValidate === 'password_confirmation') {
                if (empty($request->input('password'))) {
                    $errors['passwordError'] = 'Поле пароль обязательно для заполнения.';
                } elseif (strlen($request->input('password')) < 6) {
                    $errors['passwordError'] = 'Поле пароль должно содержать минимум 6 символов.';
                } elseif ($request->input('password') !== $request->input('password_confirmation')) {
                    $errors['passwordError'] = 'Поле пароль не совпадает с подтверждением.';
                }
            }

            if (!empty($errors)) {
                return response()->json(['error' => true] + $errors);
            }

            return response()->json(['error' => false]);
        }


        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->salt = "";
        $user->balance = 0;
        $user->save();

        return redirect()->route('main');
    }

}

