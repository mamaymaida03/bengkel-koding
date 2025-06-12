<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the appropriate dashboard based on user role.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            // Admin Dashboard
            if (Auth::user() instanceof \App\Models\User) {
                return redirect()->route('admin.index');  // Redirect to admin dashboard
            }

            // Dokter Dashboard
            if (Auth::user() instanceof \App\Models\Dokter) {
                return redirect()->route('dokter.index');  // Redirect to dokter dashboard
            }

            // Pasien Dashboard
            if (Auth::user() instanceof \App\Models\Pasien) {
                return redirect()->route('pasien.index');  // Redirect to pasien dashboard
            }
        }

        // Jika tidak ada pengguna yang login, arahkan ke halaman login
        return redirect()->route('login');
    }
}
