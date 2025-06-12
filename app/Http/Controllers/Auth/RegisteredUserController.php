<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pasien;  // Gunakan model Pasien
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view for pasien.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request for pasien.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'numeric', 'digits_between:10,25'],  // Validasi No KTP
            'no_hp' => ['required', 'numeric', 'digits_between:10,15'],  // Validasi No HP
            'alamat' => ['required', 'string', 'max:255'],
        ]);

        // Mendapatkan nomor rekam medis terakhir dan menambahkan satu
        $latestNoRm = Pasien::latest()->first(); // Mengambil pasien terakhir untuk nomor RM
        $latestNoRm = $latestNoRm ? (int) substr($latestNoRm->no_rm, -3) : 0; // Ekstrak nomor urut terakhir
        $noRm = date('Ym') . '-' . str_pad($latestNoRm + 1, 3, '0', STR_PAD_LEFT); // Generate No RM

        // Menyimpan data pasien
        $pasien = Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_rm' => $noRm, // Menyimpan no_rm yang telah di-generate
        ]);

        // Setelah pasien terdaftar, langsung diarahkan ke halaman login-pasien
        return redirect('/login-pasien')->with('success', 'Pasien berhasil didaftar');
    }
}
