<?php

namespace App\Http\Controllers;

use App\Models\Pemilihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilihanController extends Controller
{
    public function index()
    {
        $candidates = Pemilihan::orderBy('id')->get();
        return view('voting', ['candidates' => $candidates]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->voting_status == true) {
            return redirect()->back()->with('error', 'Kamu sudah memberikan suara.');
        }

        $request->validate([
            'kandidat' => 'required|exists:pemilihans,id',
        ]);

        $pemilihan = Pemilihan::findOrFail($request->kandidat);
        $pemilihan->increment('Jumlah_Suara');

        Auth::user()->update(['voting_status' => true]);

        return redirect()->back()->with('success', 'Suara kamu berhasil dikirim!');
    }
}