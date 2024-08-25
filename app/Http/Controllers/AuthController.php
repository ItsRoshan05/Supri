<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Fungsi untuk register
    public function register(Request $request)
    {
        // Validasi data yang dikirim oleh user
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
        ]);
    
        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Redirect ke halaman login setelah berhasil register
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }
    

    // Fungsi untuk login
    public function login(Request $request)
    {
        // Validasi data yang dikirim oleh user
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Cek apakah email dan password sesuai
        if (Auth::attempt($credentials)) {
            // Regenerasi session
            $request->session()->regenerate();
    
            // Redirect ke halaman utama setelah berhasil login
            return redirect('/')->with('success', 'Login successful!');
        }
    
        // Jika login gagal
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    

    // Fungsi untuk logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');

    }
}
