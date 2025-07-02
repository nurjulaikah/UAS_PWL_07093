<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Buku</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $buku['id'] ?>">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?= $buku['judul'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pengarang</label>
            <input type="text" name="pengarang" value="<?= $buku['pengarang'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" value="<?= $buku['penerbit'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" value="<?= $buku['tahun'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="<?= $buku['stok'] ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php?fitur=buku" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>