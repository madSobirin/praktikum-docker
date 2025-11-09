<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Ibu Hamil - {{ $data->nama_ibu_hamil }}</title>
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
            color: #e91e63;
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
            background-color: #fce4ec;
            padding: 10px;
            border-left: 4px solid #e91e63;
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
        <p>Data Peserta - Ibu Hamil</p>
    </div>

    <h2 class="section-title">Data Diri Ibu Hamil</h2>
    <table>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>{{ $data->nama_ibu_hamil ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">NIK</td>
            <td>{{ $data->nik_ibu_hamil ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Nama Suami</td>
            <td>{{ $data->nama_suami ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Usia</td>
            <td>{{ $data->umur ? $data->umur . ' Tahun' : '-' }}</td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td>{{ $data->alamat_ibu_hamil ?? '-' }}</td>
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
                <td class="label">Usia Kehamilan</td>
                <td>{{ $pemeriksaan->usia_kehamilan ? $pemeriksaan->usia_kehamilan . ' Minggu' : '-' }}</td>
            </tr>
            <tr>
                <td class="label">Berat Badan</td>
                <td>{{ $pemeriksaan->berat_badan_ibu ? $pemeriksaan->berat_badan_ibu . ' kg' : '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tekanan Darah</td>
                <td>{{ $pemeriksaan->tekanan_sistolik && $pemeriksaan->tekanan_diastolik ? $pemeriksaan->tekanan_sistolik . '/' . $pemeriksaan->tekanan_diastolik . ' mmHg' : '-' }}
                </td>
            </tr>
            <tr>
                <td class="label">Status Kesehatan</td>
                <td><strong>{{ $pemeriksaan->status_ibu ?? '-' }}</strong></td>
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
                ( Kader Posyandu )
            </div>
        </div>
    </div>
</body>

</html>
