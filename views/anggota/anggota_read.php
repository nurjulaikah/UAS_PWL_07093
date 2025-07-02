<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Anggota</h2>
    <a href="index.php?fitur=anggota&action=create" class="btn btn-success mb-3">Tambah Anggota</a>
    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $anggota): ?>
            <tr>
                <td><?= $anggota['id'] ?></td>
                <td><?= $anggota['nama'] ?></td>
                <td><?= $anggota['alamat'] ?></td>
                <td><?= $anggota['no_hp'] ?></td>
                <td>
                    <a href="index.php?fitur=anggota&action=update&id=<?= $anggota['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="index.php?fitur=anggota&action=delete" style="display:inline-block">
                        <input type="hidden" name="id" value="<?= $anggota['id'] ?>">
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