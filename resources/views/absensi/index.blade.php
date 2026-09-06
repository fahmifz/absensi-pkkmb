<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Absensi PKKMB</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 25px;
            color: #1f2937;
        }

        .header p {
            margin: 6px 0 0;
            color: #777;
            font-size: 14px;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-print {
            background: #2563eb;
        }

        .btn-print:hover {
            background: #1d4ed8;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .alert-success {
            margin-bottom: 20px;
            padding: 12px 15px;
            border-radius: 8px;
            background: #dcfce7;
            color: #166534;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px 12px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f8fafc;
            color: #374151;
            font-size: 14px;
        }

        td {
            color: #4b5563;
            font-size: 14px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        .action {
            text-align: center;
        }

        .btn-delete {
            padding: 7px 12px;
            border: none;
            border-radius: 6px;
            background: #dc2626;
            color: white;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        @media (max-width: 700px) {
            body {
                padding: 15px;
            }

            .header {
                gap: 15px;
                align-items: flex-start;
                flex-direction: column;
            }

            .card {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <div>
                <h1>Data Absensi PKKMB</h1>
                <p>Daftar mahasiswa yang telah melakukan absensi</p>
            </div>

            <a
                href="{{ route('absensi.print') }}"
                target="_blank"
                class="btn btn-print"
            >
                🖨 Cetak Data
            </a>

        </div>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th class="action">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($absensis as $absensi)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

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

                            <td class="action">

                                <form
                                    action="{{ route('absensi.destroy', $absensi->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data absensi {{ $absensi->nama }}?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-delete"
                                    >
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada mahasiswa yang melakukan absensi.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>