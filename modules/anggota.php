<?php
function getAllAnggota() {
    global $conn;
    $result = $conn->query("SELECT * FROM anggota");
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function getAnggotaById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM anggota WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function insertAnggota($nama, $alamat, $no_hp) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO anggota (nama, alamat, no_hp) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $alamat, $no_hp);
    return $stmt->execute();
}

function updateAnggota($id, $nama, $alamat, $no_hp) {
    global $conn;
    $stmt = $conn->prepare("UPDATE anggota SET nama = ?, alamat = ?, no_hp = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nama, $alamat, $no_hp, $id);
    return $stmt->execute();
}

function deleteAnggota($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM anggota WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Routing logic
if ($action === 'index') {
    $data = getAllAnggota();
    $title = "Data Anggota";
    $content = 'views/anggota/anggota_read.php';
    include 'views/layout.php';
} elseif ($action === 'create') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        insertAnggota($_POST['nama'], $_POST['alamat'], $_POST['no_hp']);
        header("Location: index.php?fitur=anggota&action=index");
        exit();
    } else {
        $title = "Tambah Anggota";
        $content = 'views/anggota/anggota_create.php';
        include 'views/layout.php';
    }
} elseif ($action === 'update') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updateAnggota($_POST['id'], $_POST['nama'], $_POST['alamat'], $_POST['no_hp']);
        header("Location: index.php?fitur=anggota&action=index");
        exit();
    } elseif (isset($_GET['id'])) {
        $anggota = getAnggotaById($_GET['id']);
        $title = "Edit Anggota";
        $content = 'views/anggota/anggota_update.php';
        include 'views/layout.php';
    }
} elseif ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteAnggota($_POST['id']);
    header("Location: index.php?fitur=anggota&action=index");
    exit();
}
?>
