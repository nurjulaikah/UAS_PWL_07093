<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Tambah Peminjaman</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Anggota</label>
            <select name="id_anggota" class="form-control" required>
                <?php foreach ($anggota as $a): ?>
                    <option value="<?= $a['id'] ?>"><?= $a['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Judul Buku</label>
            <select name="id_buku" class="form-control" required>
                <?php foreach ($buku as $b): ?>
                    <option value="<?= $b['id'] ?>"><?= $b['judul'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?fitur=pinjaman" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
