<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginPage ()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string', // Pastikan validasi username benar
            'password' => 'required|string|min:8',
        ]);
    
        // Ambil kredensial dari input
        $credentials = $request->only('username', 'password');
    
        // Autentikasi pengguna
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Login berhasil, regenerasi session
            $request->session()->regenerate();

             // Redirect berdasarkan role_id
             $user = Auth::user();
             if ($user->role_id == 1) {
                 return redirect('/dashboard')->with('success', 'Welcome to Admin Dashboard!');
             } elseif ($user->role_id == 2) {
                 return redirect('/')->with('success', 'Welcome to User Dashboard!');
             }

            // Jika role tidak dikenali, logout pengguna
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->withErrors(['role' => 'Your role is not recognized.']);
    
            // Redirect ke halaman '/'
            return redirect('/')
                ->with('success', 'You are successfully logged in!');
        }
    
        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'username' => 'Invalid credentials provided.',
        ])->onlyInput('username'); // Mengembalikan input username
    }
    
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna
        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerasi token CSRF
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    public function showRegisterPage ()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);

        return redirect()->route('login')->with('success', 'sadasdasdsa');
    }
}
