<?php
$title = "Data Buku";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
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
        .sidebar h4 {
            color: #fff;
            margin-bottom: 30px;
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
    <h2 class="mb-4"><?= $title ?></h2>
    <a href="index.php?fitur=buku&action=create" class="btn btn-success mb-3">Tambah Buku</a>
    <?php if (!empty($data)): ?>
    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $buku): ?>
            <tr>
                <td><?= $buku['id'] ?></td>
                <td><?= $buku['judul'] ?></td>
                <td><?= $buku['pengarang'] ?></td>
                <td><?= $buku['penerbit'] ?></td>
                <td><?= $buku['tahun'] ?></td>
                <td><?= $buku['stok'] ?></td>
                <td>
                    <a href="index.php?fitur=buku&action=update&id=<?= $buku['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="index.php?fitur=buku&action=delete" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
                        <input type="hidden" name="id" value="<?= $buku['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p class="alert alert-info">Belum ada data buku.</p>
    <?php endif; ?>
</div>

</body>
</html>
