<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class PageController extends Controller
{

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->has('username')) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string'
        ]);


        if ($request->password === '123') {
            session([
                'username' => $request->username,
                'logged_in_at' => now()
            ]);
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'password' => 'Password salah. Gunakan password: 123',
        ])->onlyInput('username');
    }

    public function dashboard()
    {
        $this->checkAuth();

        $username = session('username');
        $loginTime = session('logged_in_at');

        return view('dashboard', compact('username', 'loginTime'));
    }

    public function profile()
    {
        $this->checkAuth();

        $username = session('username');
        return view('profile', compact('username'));
    }


    public function pengelolaan()
    {
        $this->checkAuth();
        $menus = Menu::all();

        return view('pengelolaan', [
            'menus' => $menus,
            'username' => session('username', 'Admin')
        ]);
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login')->with('status', 'Anda telah logout');
    }

    protected function checkAuth()
    {
        if (!session()->has('username')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }
    }
}
