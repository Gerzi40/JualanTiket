<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('page.guest.login');
    }

    public function register()
    {
        return view('page.guest.register');
    }

    public function attemptRegister(Request $req)
    {

        $data = $req->validate([
            'name' => 'required|min:3|max:50',
            'phone' => 'required|digits_between:10,15',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'dob' => 'required|date|before:today',
            'gender' => 'required|in:male,female'
        ], [
            'name.required' => 'The username is required.',
            'name.min' => 'The username must be at least 3 characters.',
            'name.max' => 'The username may not be greater than 50 characters.',

            'phone.required' => 'The phone number is required.',
            'phone.digits_between' => 'The phone number must be between 10 and 15 digits.',

            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',

            'password.required' => 'A password is required.',
            'password.min' => 'The password must be at least 8 characters.',

            'dob.required' => 'The date of birth is required.',
            'dob.date' => 'Please provide a valid date of birth.',
            'dob.before' => 'The date of birth must be a past date.',

            'gender.required' => 'The gender is required.',
            'gender.in' => 'The gender must be one of the following: male and female',
        ]);

        $exist = User::where('email', '=', $data['email'])->first();
        $exist2 =  Admin::where('email', '=', $data['email'])->first();

        if ($exist != null || $exist2 != null) {
            return redirect()->route('register')->withErrors([
                'email' => 'Account already exists.',
            ]);
        }

        User::create($data);

        return redirect()->route('login');
    }

    public function attemptLogin(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',

            'password.required' => 'A password is required.',
        ]);

        $credentials = $req->only('email', 'password');

        $userData = User::where('email', '=', $credentials['email'])->first();

        if (!$userData) {
            $userData = Admin::where('email', '=', $credentials['email'])->first();

            if (!$userData || $userData['password'] !== $userData['password']) {
                return redirect()->back()->with('fail', 'Email atau password salah');
            }

            Auth::guard('admin')->login($userData);
            return redirect()->route('admin.home');
        } else {
            if (!Hash::check($credentials['password'], $userData['password'])) {
                return redirect()->back()->with('fail', 'Email atau password salah');
            }

            Auth::login($userData);
            return redirect()->route('user.home');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
