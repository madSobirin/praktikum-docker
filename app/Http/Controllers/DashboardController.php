<?php

namespace App\Http\Controllers;

use App\Models\Balita;

use App\Models\IbuHamil;
use App\Models\Pemeriksaan;
use App\Models\JadwalPosyandu;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Dashboard untuk Kader
    public function kader()
    {
        return view("kader.dashboard", [
            "title" => "Dashboard Kader",
            "user" => Auth::user(),

            // Total Balita 
            "totalBalita" => Balita::where('user_id', Auth::id())->get(),
            // Chart
            "totalGiziBaik" => Pemeriksaan::where("user_id", Auth::id())
                ->where("status_gizi", "Gizi Baik")
                ->count(),

            "totalGiziBuruk" => Pemeriksaan::where("user_id", Auth::id())
                ->where("status_gizi", "Gizi Buruk")
                ->count(),

            "totalStunting" => Pemeriksaan::where("user_id", Auth::id())
                ->where("status_gizi", "Stunting")
                ->count(),

            // Chart
            "totalIbuHamil" => IbuHamil::where("user_id", Auth::id())->get(),
            "totalKondisiBaik" => Pemeriksaan::where("user_id", Auth::id())
                ->where("status_ibu", "Kondisi Baik")
                ->count(),

            "totalKondisiAnemia" => Pemeriksaan::where("user_id", Auth::id())
                ->where("status_ibu", "Anemia")
                ->count(),

            //jadwal
            "jadwals" => JadwalPosyandu::all(),
        ]);
    }

    public function pengguna()
    {
        return view("pengguna.dashboard", [
            "title" => "Dashboard Pengguna",
            "user" => Auth::user(),
        ]);
    }
}
