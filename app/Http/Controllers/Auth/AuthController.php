<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $creds = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($creds, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
        }

        $request->session()->regenerate();
        return $this->redirectByRole(Auth::user());
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:mongodb.users,email',
            'phone'    => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|in:farmer,buyer',
            'state'    => 'nullable|string',
            'district' => 'nullable|string',
            'pincode'  => 'nullable|string',
        ]);

        $user = User::create([
            ...$data,
            'password'        => Hash::make($data['password']),
            'is_kyc_verified' => false,
            'is_active'       => true,
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        return $this->redirectByRole($user);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    private function redirectByRole(User $user): \Illuminate\Http\RedirectResponse
    {
        return match ($user->role) {
            'farmer' => redirect()->route('farmer.dashboard'),
            'buyer'  => redirect()->route('marketplace'),
            'admin'  => redirect()->route('admin.dashboard'),
            default  => redirect()->route('home'),
        };
    }
}
