<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RegisterRequest;
use App\Http\Requests\Admin\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\Models\User;

class AuthController extends Controller
{
    public $title = 'Admin';

    public function __construct()
    {
        View::share('title', $this->title);
    }

    public $module = 'admin.auth';

    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $input = $request->all();

        if (Auth::attempt(['email' => $input['email'] , 'role' => 'admin' , 'password' => $input['password']] , $input['remember_me'] ?? '')) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Login Gagal!'
        ], 401);
    }

    public function registerForm()
    {
        return view('admin.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $input = $request->all();

        // password different
        if ($input['password'] !== $input['repeat_password']) {
            Alert::error('Register failed!', 'Password and repeat password not same.');
            return back();
        }

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        Alert::success('Register Success!', 'Welcome, '.$user->name);
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
