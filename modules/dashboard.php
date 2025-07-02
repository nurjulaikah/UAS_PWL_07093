<?php
function countData($table) {
    global $conn;
    $result = $conn->query("SELECT COUNT(*) as total FROM $table");
    return $result->fetch_assoc();
}

// Ambil total data dari masing-masing tabel
$buku = countData('buku');
$anggota = countData('anggota');
$pinjaman = countData('peminjaman');

// Siapkan tampilan
$title = "Dashboard";
$content = 'views/dashboard.php';
include 'views/layout.php';
