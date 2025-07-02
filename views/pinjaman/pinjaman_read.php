<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Peminjaman</h2>

    <a href="index.php?fitur=pinjaman&action=create" class="btn btn-success mb-3">Tambah Peminjaman</a>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['nama_anggota'] ?></td>
                <td><?= $p['judul_buku'] ?></td>
                <td><?= $p['tanggal_pinjam'] ?></td>
                <td><?= $p['tanggal_kembali'] ?></td>
                <td>
                    <a href="index.php?fitur=pinjaman&action=update&id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="index.php?fitur=pinjaman&action=delete" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
