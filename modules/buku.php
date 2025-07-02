<?php
if (!isset($action)) {
    $action = 'index';
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
function getBukuById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
function insertBuku($judul, $pengarang, $penerbit, $tahun, $stok) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO buku (judul, pengarang, penerbit, tahun, stok) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $judul, $pengarang, $penerbit, $tahun, $stok);
    return $stmt->execute();
}
function updateBuku($id, $judul, $pengarang, $penerbit, $tahun, $stok) {
    global $conn;
    $stmt = $conn->prepare("UPDATE buku SET judul = ?, pengarang = ?, penerbit = ?, tahun = ?, stok = ? WHERE id = ?");
    $stmt->bind_param("sssiii", $judul, $pengarang, $penerbit, $tahun, $stok, $id);
    return $stmt->execute();
}
function deleteBuku($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

if ($action === 'index') {
    $data = getAllBuku();
    include 'views/buku/buku_read.php';
} elseif ($action === 'create') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        insertBuku($_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], $_POST['tahun'], $_POST['stok']);
        header("Location: index.php?fitur=buku");
    } else {
        include 'views/buku/buku_create.php';
    }
} elseif ($action === 'update') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updateBuku($_POST['id'], $_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], $_POST['tahun'], $_POST['stok']);
        header("Location: index.php?fitur=buku");
    } elseif (isset($_GET['id'])) {
        $buku = getBukuById($_GET['id']);
        include 'views/buku/buku_update.php';
    }
} elseif ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteBuku($_POST['id']);
    header("Location: index.php?fitur=buku");
}
?>