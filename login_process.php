<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Cek user di database
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username=? AND password=MD5(?) LIMIT 1");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Set session
        $_SESSION['user_id']   = $row['id_user'];
        $_SESSION['user_name'] = $row['nama_user'];
        $_SESSION['level']     = $row['level'];

        header("Location: dashboard.php");
        exit;
    } else {
        // Login gagal
        header("Location: login.php?error=1");
        exit;
    }
}
?>
