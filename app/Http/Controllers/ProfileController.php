<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balita;
use App\Models\IbuHamil;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Auth::user();
        $totalBalita = Balita::where('user_id', $profiles->id)->get();
        $totalIbuHamil = IbuHamil::where('user_id', $profiles->id)->get();

        $totalPeserta = $totalBalita->count() + $totalIbuHamil->count();



        // Hitung Seluruh Pemeriksaa
        $pemeriksaans = Pemeriksaan::where('user_id', $profiles->id)->get();
        return view('profile.index', compact('profiles', 'pemeriksaans', 'totalPeserta'));
    }


}
