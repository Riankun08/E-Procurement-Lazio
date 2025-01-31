<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Admin\RegisterRequest;
use App\Http\Requests\Admin\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;

class AuthController extends Controller
{
    public $module = 'customer.auth';
    public function loginForm()
    {
        return view('client.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $input = $request->all();
        
        if (Auth::guard('customer')->attempt(['email' => $input['email'], 'role' => 'customer' , 'status' => 'publish' , 'password' => $input['password']] , $input['remember_me'] ?? '')) {
            $request->session()->regenerate();
            return redirect()->route('client.landing.log')->with('success', 'selamat anda telah berhasi login, '.auth('customer')->user()->name);
            Alert::success('Login Success!', 'Welcome, '.auth('customer')->user()->name);
        }
        Alert::error('Log in gagal!', 'email dan password salah.');
        return back();
    }

    public function registerForm()
    {
        return view('client.auth.register');
    }

    public function registerStore(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,webp',
        ]);
    
        $input = $req->all();
        $password = Hash::make($input['password']);
    
        $data = [
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => $password,
            'role' => 'vendor',
        ];
    
        $image = $this->handleImage($req);  // Use $req instead of $request
        if ($image) {
            $data['image'] = $image;
        } else {
            unset($data['image']);
        }
    
        $result = User::create($data);  // This is the created user
    
        // Create the Vendor using $result->id
        Vendor::create([
            'code' => '',
            'user_id' => $result->id,  // Use $result->id
            'name' => $input['name'],
            'phone' => $input['phone'],
            'address' => $input['address'],
        ]);
    
        if ($result) {
            // Auth::login($result, true);
            Alert::success('Register Success!', 'Your Data Has Been Send Waiting For Approval Admin');
            return redirect('/');  // Ensure the route is correct
        } else {
            session()->flash('error', 'Gagal register');
            return redirect()->back();
        }
    }
    

    private function handleImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move('image-save/image-vendor/', $filename);
            return $filename;
        }
        return null;
    }

    public function messages()
    {
        return [
            'name.required' => 'masukan nama dengan benar',
            'phone.required' => 'masukan no.telpon dengan benar',
            'email.required' => 'masukan email dengan benar',
            'password.required' => 'minaml 8 charakter',
        ];
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        Alert::success('Logout Success');
        return redirect()->route('client.login');
    }
}
