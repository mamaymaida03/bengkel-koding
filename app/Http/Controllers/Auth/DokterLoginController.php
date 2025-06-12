<?php

namespace App\Http\Controllers\Auth;

use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DokterLoginController extends Controller
{
    /**
     * Show the Dokter login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.dokter-login');
    }

    /**
     * Handle Dokter login.
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

        $dokter = Dokter::where('nama', $request->nama)
                        ->where('alamat', $request->alamat)
                        ->first();

        if ($dokter) {
            Auth::guard('dokter')->login($dokter);
            return redirect()->route('dokter.index'); // Arahkan ke dashboard dokter
        }

        return back()->withErrors(['message' => 'Nama dan alamat tidak cocok dengan data dokter.']);
    }
}
