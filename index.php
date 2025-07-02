<?php
require_once 'config.php';

$fitur = $_GET['fitur'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

// Cek login
if (!isset($_SESSION['username']) && $fitur !== 'autentikasi') {
    header("Location: index.php?fitur=autentikasi&action=login");
    exit();
}

switch ($fitur) {
    case 'autentikasi': include 'modules/autentikasi.php'; break;
    case 'dashboard': include 'modules/dashboard.php'; break;
    case 'buku': include 'modules/buku.php'; break;
    case 'anggota': include 'modules/anggota.php'; break;
    case 'pinjaman': include 'modules/pinjaman.php'; break;
    case 'logout': session_destroy(); header("Location: index.php"); break;
    default: echo "Halaman tidak ditemukan."; break;
}
?>
