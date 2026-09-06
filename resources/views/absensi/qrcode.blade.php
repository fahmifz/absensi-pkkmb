<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>QR Code Absensi PKKMB</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
        }

        .card {
            width: 100%;
            max-width: 500px;
            padding: 35px;
            background: #fff;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        h1 {
            margin: 0;
            color: #2563eb;
            font-size: 25px;
        }

        p {
            margin: 10px 0;
            color: #666;
            font-size: 14px;
        }

        .qr-code {
            display: flex;
            justify-content: center;
            margin: 25px 0;
        }

        .url {
            margin-bottom: 20px;
            padding: 10px;
            background: #f3f4f6;
            border-radius: 7px;
            color: #555;
            font-size: 13px;
            word-break: break-all;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        @media print {
            body {
                background: #fff;
            }

            .card {
                box-shadow: none;
            }

            .btn,
            .url {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="logo">
            <img
                src="{{ asset('img/LogoUndipa.png') }}"
                alt="Logo Universitas Dipa Makassar"
            >
        </div>

        <h1>ABSENSI PKKMB</h1>

        <p>
            Scan QR Code untuk melakukan absensi
        </p>

        <div class="qr-code">
            {!! QrCode::size(280)->generate(route('absensi.create')) !!}
        </div>

        <div class="url">
            {{ route('absensi.create') }}
        </div>

        <button
            type="button"
            class="btn"
            onclick="window.print()"
        >
            🖨 Cetak QR Code
        </button>

    </div>

</body>

</html>