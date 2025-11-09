<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\IbuHamil;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('kader.laporan.index');
    }

    public function search(Request $request)
    {
        $q = $request->get('q');

        $balita = Balita::where('nama_balita', 'like', "%$q%")
            ->orWhere('nik', 'like', "%$q%")
            ->get(['id', 'nik', 'nama_balita as nama']);

        $ibu = IbuHamil::where('nama_ibu_hamil', 'like', "%$q%")
            ->orWhere('nik_ibu_hamil', 'like', "%$q%")
            ->get(['id', 'nik_ibu_hamil as nik', 'nama_ibu_hamil as nama']);

        return response()->json([
            'balita' => $balita,
            'ibu' => $ibu
        ]);
    }

    // 📋 Detail berdasarkan tipe (balita / ibu)
    public function show($tipe, $id)
    {
        if ($tipe === 'balita') {
            $data = Balita::findOrFail($id);
            $pemeriksaan = Pemeriksaan::where('balita_id', $id)->latest()->first();

            return response()->json([
                'data' => [
                    'nama' => $data->nama_balita,
                    'nik' => $data->nik,
                    'jenis_kelamin' => $data->jenis_kelamin,
                    'tanggal_lahir' => $data->usia_tahun . ' tahun ' . $data->usia_bulan . ' bulan',
                    'nama_orang_tua' => $data->nama_orang_tua,
                    'alamat' => $data->alamat,
                ],
                'pemeriksaan' => $pemeriksaan ? [
                    'tanggal' => $pemeriksaan->tanggal,
                    'berat_badan' => $pemeriksaan->berat_badan_balita,
                    'tinggi_badan' => $pemeriksaan->tinggi_badan,
                    'status_gizi' => $pemeriksaan->status_gizi,
                ] : null
            ]);
        }

        if ($tipe === 'ibu') {
            $data = IbuHamil::findOrFail($id);
            $pemeriksaan = Pemeriksaan::where('ibu_hamil_id', $id)->latest()->first();

            return response()->json([
                'data' => [
                    'nama' => $data->nama_ibu_hamil,
                    'nik' => $data->nik_ibu_hamil,
                    'nama_suami' => $data->nama_suami,
                    'umur' => $data->umur,
                    'alamat' => $data->alamat_ibu_hamil,
                ],
                'pemeriksaan' => $pemeriksaan ? [
                    'tanggal' => $pemeriksaan->tanggal,
                    'berat_badan' => $pemeriksaan->berat_badan_ibu,
                    'tekanan_darah' => $pemeriksaan->tekanan_sistolik . '/' . $pemeriksaan->tekanan_diastolik,
                    'usia_kehamilan' => $pemeriksaan->usia_kehamilan,
                    'status_ibu' => $pemeriksaan->status_ibu,
                ] : null
            ]);
        }

        return response()->json(['error' => 'Tipe tidak dikenali'], 400);
    }
}


