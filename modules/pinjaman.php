<?php
function getAllPeminjaman() {
    global $conn;
    $sql = "SELECT p.id, a.nama AS nama_anggota, b.judul AS judul_buku, p.tanggal_pinjam, p.tanggal_kembali
            FROM peminjaman p
            JOIN anggota a ON p.id_anggota = a.id
            JOIN buku b ON p.id_buku = b.id";
    $result = $conn->query($sql);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function getPeminjamanById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function insertPeminjaman($id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO peminjaman (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali);
    return $stmt->execute();
}

function updatePeminjaman($id, $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali) {
    global $conn;
    $stmt = $conn->prepare("UPDATE peminjaman SET id_anggota = ?, id_buku = ?, tanggal_pinjam = ?, tanggal_kembali = ? WHERE id = ?");
    $stmt->bind_param("iissi", $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali, $id);
    return $stmt->execute();
}

function deletePeminjaman($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Tambahkan fungsi pendukung
function getAllAnggota() {
    global $conn;
    $result = $conn->query("SELECT * FROM anggota");
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function getAllBuku() {
    global $conn;
    $result = $conn->query("SELECT * FROM buku");
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

// ROUTING
if ($action === 'index') {
    $data = getAllPeminjaman();
    $title = "Data Peminjaman";
    $content = 'views/pinjaman/pinjaman_read.php';
    include 'views/layout.php';
} elseif ($action === 'create') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        insertPeminjaman($_POST['id_anggota'], $_POST['id_buku'], $_POST['tanggal_pinjam'], $_POST['tanggal_kembali']);
        header("Location: index.php?fitur=pinjaman&action=index");
        exit();
    } else {
        $anggota = getAllAnggota();
        $buku = getAllBuku();
        $title = "Tambah Peminjaman";
        $content = 'views/pinjaman/pinjaman_create.php';
        include 'views/layout.php';
    }
} elseif ($action === 'update') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updatePeminjaman($_POST['id'], $_POST['id_anggota'], $_POST['id_buku'], $_POST['tanggal_pinjam'], $_POST['tanggal_kembali']);
        header("Location: index.php?fitur=pinjaman&action=index");
        exit();
    } elseif (isset($_GET['id'])) {
        $peminjaman = getPeminjamanById($_GET['id']);
        $anggota = getAllAnggota();
        $buku = getAllBuku();
        $title = "Edit Peminjaman";
        $content = 'views/pinjaman/pinjaman_update.php';
        include 'views/layout.php';
    }
} elseif ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    deletePeminjaman($_POST['id']);
    header("Location: index.php?fitur=pinjaman&action=index");
    exit();
}
?>
