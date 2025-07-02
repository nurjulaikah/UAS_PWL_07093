<!-- views/layout.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Perpustakaan' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #1e3a8a;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #3b82f6;
            border-radius: 5px;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h4>📚 Perpustakaan</h4>
    <a href="index.php?fitur=dashboard">Dashboard</a>
    <a href="index.php?fitur=buku">Buku</a>
    <a href="index.php?fitur=anggota">Anggota</a>
    <a href="index.php?fitur=pinjaman">Peminjaman</a>
    <hr>
    <a href="index.php?fitur=logout" class="btn btn-danger btn-sm mt-2">Logout</a>
</div>

<div class="content">
    <?php include $content; ?>
</div>

</body>
</html>
