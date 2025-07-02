<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0f172a, #1e3a8a); /* biru tua */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 2.5rem;
            max-width: 450px;
            width: 100%;
            background-color: #fff;
        }

        .card-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2rem;
        }

        .form-label {
            font-weight: 400;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 0.25rem rgba(30, 58, 138, 0.25);
        }

        .btn-primary {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #0f172a;
            border-color: #0f172a;
            transform: translateY(-2px);
        }

        .btn-link {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 400;
            margin-top: 1rem;
            display: block;
            text-align: center;
        }

        .btn-link:hover {
            text-decoration: underline;
            color: #0f172a;
        }

        .alert {
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="card-title">Daftar Akun Baru</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nama Pengguna</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Pilih nama pengguna Anda" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Buat kata sandi baru" required>
            </div>
            <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
            <a href="index.php?fitur=autentikasi&action=login" class="btn btn-link">Sudah punya akun? Masuk di sini</a>
        </form>
    </div>
</body>
</html>
