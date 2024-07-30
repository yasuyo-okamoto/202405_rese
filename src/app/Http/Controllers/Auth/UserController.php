<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;


class UserController extends Controller
{
  public function showRegistrationForm()
    {
      return view('auth.register');
    }

    public function store(UserRequest $request)
    {
      $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);

        // メール認証を送信
        $user->sendEmailVerificationNotification();

        return redirect('/thanks');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

  public function login(UserRequest $request)
  {
    $email = $request->email;

        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                RateLimiter::clear($this->throttleKey($request));

                return redirect()->intended('/');
            }

            RateLimiter::hit($this->throttleKey($request));

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        };
      }


    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
  }

}
