<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Jika pengguna sudah login, arahkan ke halaman home
        if (Auth::check()) {
            return view('home');
        }

        // Jika pengguna belum login, arahkan ke halaman login
        return redirect()->route('login');
    }

    /**
     * Redirect authenticated users to home.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticatedRedirect()
    {
        return redirect()->route('home');
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showRegistrationForm()
    {
        // Jika pengguna sudah login, arahkan ke halaman home
        if (Auth::check()) {
            return redirect()->route('home');
        }

        // Jika pengguna belum login, tampilkan halaman registrasi
        return view('auth.register');
    }
}
