<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AmayyyMedica</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h2 {
            color: #6a11cb;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .login-container p {
            color: #555;
            font-size: 14px;
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

        .btn-login {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            font-weight: bold;
            color: #fff;
            width: 100%;
            height: 45px;
            border-radius: 8px;
            transition: 0.3s ease;
        }

        .btn-login:hover {
            opacity: 0.9;
        }

        .register-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: #2575fc;
            text-decoration: none;
        }

        .footer {
            margin-top: 15px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>AmayyyMedica</h2>
    <p>Selamat datang! Silakan login</p>

    @if ($errors->any())
        <div class="alert alert-danger text-start">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div class="form-group">
            <i class="fa fa-envelope form-control-icon"></i>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="Email" required autofocus>
        </div>

        <div class="form-group">
            <i class="fa fa-lock form-control-icon"></i>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="Password" required>
        </div>

        <div class="mb-3 form-check text-start">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Ingat Saya</label>
        </div>

        <button type="submit" class="btn btn-login">Login</button>
    </form>

    <div class="register-link">
        Belum punya akun? <a href="{{ url('/register') }}">Daftar disini</a>
    </div>

    <div class="footer mt-3">
        &copy; {{ date('Y') }} AmayyyMedica. All rights reserved.
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
