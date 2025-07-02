<?php
if ($action === 'login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && password_verify($password, $result['password'])) {
            $_SESSION['username'] = $result['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Username atau password salah.";
        }
    }
    include 'views/autentikasi/login.php';
} elseif ($action === 'register') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            header("Location: index.php?fitur=autentikasi&action=login");
            exit();
        } else {
            $error = "Registrasi gagal. Username mungkin sudah digunakan.";
        }
    }
    include 'views/autentikasi/register.php';
}
?>
