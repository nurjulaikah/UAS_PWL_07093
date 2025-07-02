<?php
$title = "Dashboard";
// Pastikan sesi sudah dimulai dan 'username' tersedia
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika sesi tidak ada
    header("Location: index.php?fitur=autentikasi&action=login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?> - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5; /* Latar belakang abu-abu muda */
        }
        .container-fluid {
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .welcome-heading {
            font-weight: 700; /* Lebih tebal untuk judul utama */
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .card {
            border-radius: 12px; /* Sudut membulat */
            border: none; /* Hilangkan border default */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transisi untuk hover */
            cursor: pointer; /* Menunjukkan bisa diklik (jika ada fungsi klik nantinya) */
        }
        .card:hover {
            transform: translateY(-5px); /* Efek sedikit naik saat hover */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* Bayangan lebih gelap saat hover */
        }
        .card-body {
            padding: 25px;
        }
        .card-title {
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px; /* Jarak antara ikon dan teks */
        }
        .card-title .icon {
            font-size: 1.5em;
        }
        .card h1 {
            font-size: 3.5em; /* Ukuran angka yang besar */
            font-weight: 700;
            margin-top: 15px;
            color: #333; /* Warna gelap untuk angka */
            animation: fadeIn 1s ease-out; /* Animasi fade-in untuk angka */
        }

        /* Warna Border dan Teks Card */
        .card.border-primary { border-left: 5px solid #007bff !important; }
        .card .text-primary { color: #007bff !important; }

        .card.border-success { border-left: 5px solid #28a745 !important; }
        .card .text-success { color: #28a745 !important; }

        .card.border-warning { border-left: 5px solid #ffc107 !important; }
        .card .text-warning { color: #ffc107 !important; }

        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsiveness untuk judul */
        @media (max-width: 767px) {
            .welcome-heading {
                font-size: 1.8em;
            }
            .card h1 {
                font-size: 2.5em;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <h2 class="welcome-heading">Selamat Datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
<div class="row justify-content-center">
        <div class="col-sm-6 col-md-4 mb-4">
            <div class="card shadow border-primary">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">
                        <i class="fas fa-book icon"></i> Total Buku
                    </h5>
                    <h1><?= $buku['total'] ?? 0 ?></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
            <div class="card shadow border-success">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">
                        <i class="fas fa-users icon"></i> Total Anggota
                    </h5>
                    <h1><?= $anggota['total'] ?? 0 ?></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
            <div class="card shadow border-warning">
                <div class="card-body text-center">
                    <h5 class="card-title text-warning">
                        <i class="fas fa-exchange-alt icon"></i> Total Peminjaman
                    </h5>
                    <h1><?= $pinjaman['total'] ?? 0 ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>