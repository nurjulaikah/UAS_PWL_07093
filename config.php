<?php
session_start(); 

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'perpustakaanku';

// membuat koneksi baru ke database
$conn = new mysqli($host, $user, $pass, $db);

// periksa apakah koneksi berhasil
if ($conn->connect_error) {
    // jika koneksi gagal, eksekusi skrip akan dihentikan
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
