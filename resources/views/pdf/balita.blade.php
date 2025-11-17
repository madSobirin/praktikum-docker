<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Balita - {{ $data->nama_balita }}</title>
    <style>
        @page {
            size: A4;
            margin: 1in;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            font-size: 14px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            color: #70b2b2;
            font-size: 24px;
            font-weight: 600;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #555;
        }

        h2.section-title {
            font-size: 18px;
            font-weight: 600;
            background-color: #f9f9f9;
            padding: 10px;
            border-left: 4px solid #70b2b2;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 10px 8px;
            border: 1px solid #e0e0e0;
            vertical-align: top;
        }

        table td.label {
            font-weight: 600;
            width: 35%;
            background-color: #fafafa;
            color: #444;
        }

        .no-data {
            text-align: center;
            color: #888;
            font-style: italic;
            padding: 20px;
            border: 1px solid #e0e0e0;
        }

        .footer {
            position: fixed;
            bottom: -20px;
            /* Posisikan di luar margin bawah */
            left: 0;
            right: 0;
            height: 100px;
            text-align: right;
            font-size: 12px;
            color: #777;
        }

        .footer-content {
            width: 100%;
        }

        .footer .signature {
            margin-top: 40px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Laporan Data Posyandu</h1>
        <p>Data Peserta - Balita</p>
    </div>

    <h2 class="section-title">Data Diri Balita</h2>
    <table>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>{{ $data->nama_balita ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">NIK</td>
            <td>{{ $data->nik ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td>{{ $data->jenis_kelamin ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Lahir</td>
            <td>{{ \Carbon\Carbon::parse($data->tgl_lahir)->isoFormat('D MMMM Y') ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Usia</td>
            <td>{{ $data->usia_tahun ?? 0 }} tahun {{ $data->usia_bulan ?? 0 }} bulan</td>
        </tr>
        <tr>
            <td class="label">Nama Orang Tua</td>
            <td>{{ $data->nama_orang_tua ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td>{{ $data->alamat ?? '-' }}</td>
        </tr>
    </table>

    <h2 class="section-title">Pemeriksaan Terakhir</h2>
    @if ($pemeriksaan)
        <table>
            <tr>
                <td class="label">Tanggal Pemeriksaan</td>
                <td>{{ \Carbon\Carbon::parse($pemeriksaan->tanggal)->isoFormat('D MMMM Y') ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Berat Badan</td>
                <td>{{ $pemeriksaan->berat_badan_balita ? $pemeriksaan->berat_badan_balita . ' kg' : '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tinggi Badan</td>
                <td>{{ $pemeriksaan->tinggi_badan ? $pemeriksaan->tinggi_badan . ' cm' : '-' }}</td>
            </tr>
            <tr>
                <td class="label">Status Gizi</td>
                <td><strong>{{ $pemeriksaan->status_gizi ?? '-' }}</strong></td>
            </tr>
        </table>
    @else
        <div class="no-data">
            Belum ada data pemeriksaan terakhir.
        </div>
    @endif

    <div class="footer">
        <div class="footer-content">
            Lohbener, {{ date('d') }} {{ \Carbon\Carbon::now()->isoFormat('MMMM') }} {{ date('Y') }}
            <div class="signature">
                {{ $user->name }}
            </div>
        </div>
    </div>
</body>

</html>
