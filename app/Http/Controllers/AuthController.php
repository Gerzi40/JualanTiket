<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        try {
            $data = $req->only([
                'name',
                'phone',
                'email',
                'password',
                'dob',
                'gender'
            ]);

            $exist = User::where('email', '=', $data['email'])->first();

            if ($exist != null) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Account Already Exists'
                ], 422);
            }

            User::create($data);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 1,
                'message' => $e
            ], 422);
        }

        return redirect()->route('login');
    }

    public function attemptLogin(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
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
}
