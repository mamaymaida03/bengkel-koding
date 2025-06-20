<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - AmayyyMedica</title>

    <!-- Bootstrap CSS & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-container {
            max-width: 500px;
            width: 100%;
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .register-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #6a11cb;
            margin-bottom: 10px;
        }

        .register-subtitle {
            text-align: center;
            color: #555;
            margin-bottom: 25px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            padding-left: 40px;
            height: 45px;
        }

        .form-control-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #999;
        }

        textarea.form-control {
            padding-left: 40px;
            resize: none;
        }

        .btn-register {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            font-weight: bold;
            color: white;
            width: 100%;
            height: 45px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-register:hover {
            opacity: 0.9;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-link a {
            color: #2575fc;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            margin-top: 10px;
        }

        .form-text {
            font-size: 12px;
            margin-left: 5px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="text-center">
        <h2 class="register-title">AmayyyMedica</h2>
        <p class="register-subtitle">Daftar akun baru</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger text-start">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <div class="form-group">
            <i class="fa fa-user form-control-icon"></i>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   placeholder="Nama" value="{{ old('name') }}" required autofocus>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <i class="fa fa-envelope form-control-icon"></i>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   placeholder="Email" value="{{ old('email') }}" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <i class="fa fa-phone form-control-icon"></i>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                   placeholder="08xxxxxxxxxx" value="{{ old('no_hp') }}">
            @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <i class="fa fa-id-card form-control-icon"></i>
            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp"
                   placeholder="16 digit nomor KTP" value="{{ old('no_ktp') }}" maxlength="16">
            @error('no_ktp') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <i class="fa fa-map-marker-alt form-control-icon"></i>
            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                      placeholder="Masukkan alamat lengkap" rows="2">{{ old('alamat') }}</textarea>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <input type="hidden" name="role" value="pasien">

        <div class="form-group">
            <i class="fa fa-lock form-control-icon"></i>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                   placeholder="Password minimal 6 karakter" required>
            <div class="form-text">Password minimal 6 karakter</div>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <i class="fa fa-lock form-control-icon"></i>
            <input type="password" class="form-control" name="password_confirmation"
                   placeholder="Konfirmasi Password" required>
        </div>

        <button type="submit" class="btn btn-register">Register</button>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="{{ url('/login') }}">Login disini</a>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} AmayyyMedica. All rights reserved.
    </div>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
