<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Anggota</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $anggota['id'] ?>">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $anggota['nama'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= $anggota['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" value="<?= $anggota['no_hp'] ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php?fitur=anggota" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>