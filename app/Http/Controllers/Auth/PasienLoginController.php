<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasienLoginController extends Controller
{
    /**
     * Show the Pasien login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.pasien-login');
    }

    /**
     * Handle Pasien login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $pasien = Pasien::where('nama', $request->nama)
                        ->where('alamat', $request->alamat)
                        ->first();

        if ($pasien) {
            Auth::guard('pasien')->login($pasien);
            return redirect()->route('pasien.index'); // Arahkan ke dashboard pasien
        }

        return back()->withErrors(['message' => 'Nama dan alamat tidak cocok dengan data pasien.']);
    }
}
