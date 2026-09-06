    <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi PKKMB</title>

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
            max-width: 450px;
            padding: 35px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .logo {
            margin-bottom: 28px;
            text-align: center;
        }

        .logo-image {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }

        .logo-image img {
            display: block;
            width: 90px;
            height: 90px;
            object-fit: contain;
        }

        .logo h1 {
            margin: 0;
            color: #2563eb;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .logo p {
            margin: 8px 0 0;
            color: #777;
            font-size: 14px;
        }

        .alert-success {
            margin-bottom: 20px;
            padding: 12px 15px;
            color: #166534;
            background: #dcfce7;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-error {
            margin-bottom: 20px;
            padding: 12px 15px;
            color: #991b1b;
            background: #fee2e2;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        input::placeholder {
            color: #aaa;
        }

        .btn {
            width: 100%;
            margin-top: 5px;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .btn:active {
            transform: scale(0.99);
        }

        .footer {
            margin-top: 25px;
            color: #999;
            text-align: center;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .card {
                padding: 25px 20px;
                border-radius: 12px;
            }

            .logo-image img {
                width: 75px;
                height: 75px;
            }

            .logo h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="logo">
            <div class="logo-image">
                <img
                    src="{{ asset('img/LogoUndipa.png') }}"
                    alt="Logo Universitas Dipa Makassar"
                >
            </div>

            <h1>ABSENSI PKKMB</h1>
            <p>Silakan isi data kehadiran Anda</p>
        </div>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="nim">NIM</label>

                <input
                    type="text"
                    id="nim"
                    name="nim"
                    value="{{ old('nim') }}"
                    placeholder="Masukkan NIM"
                    required
                >
            </div>

            <button type="submit" class="btn">
                SUBMIT ABSENSI
            </button>
        </form>

        <div class="footer">
            PKKMB &copy; {{ date('Y') }}
        </div>
    </div>
</body>

</html>

