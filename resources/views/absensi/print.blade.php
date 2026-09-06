<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">

<title>Cetak Absensi PKKMB</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
        color: #000;
    }

    .header {
        text-align: center;
        margin-bottom: 25px;
    }

    .header h2 {
        margin: 0;
    }

    .header p {
        margin: 5px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        font-size: 13px;
    }

    th {
        text-align: center;
    }

    .no {
        width: 50px;
        text-align: center;
    }

    .summary {
        margin-top: 15px;
        font-weight: bold;
    }

    .no-print {
        margin-bottom: 20px;
    }

    .btn {
        padding: 10px 15px;
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    @media print {
        .no-print {
            display: none;
        }

        body {
            margin: 15px;
        }
    }
</style>

</head>

<body>

<div class="no-print">
    <button class="btn" onclick="window.print()">
        🖨 Cetak
    </button>
</div>

<div class="header">

<h2>DAFTAR ABSENSI MAHASISWA</h2>
<h2>PKKMB</h2>

<p>
    Tanggal:
    {{ now()->format('d F Y') }}
</p>

</div>

<table>

<thead>
    <tr>
        <th class="no">No</th>
        <th>Nama Lengkap</th>
        <th>NIM</th>
        <th>Tanggal</th>
        <th>Jam</th>
    </tr>
</thead>

<tbody>

    @forelse($absensis as $absensi)

        <tr style="text-align: center;">
            <td class="no">
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $absensi->nama }}
            </td>

            <td>
                {{ $absensi->nim }}
            </td>

            <td>
                {{ $absensi->created_at->format('d/m/Y') }}
            </td>

            <td>
                {{ $absensi->created_at->format('H:i:s') }}
            </td>
        </tr>

    @empty

        <tr>
            <td colspan="5" style="text-align:center;">
                Belum ada data absensi.
            </td>
        </tr>

    @endforelse

</tbody>


</table>

<div class="summary">
    Total Mahasiswa Hadir: {{ $absensis->count() }} Orang
</div>

</body>
</html>
