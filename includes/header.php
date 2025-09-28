<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");  
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title . ' - Ujikom' : 'Dashboard - Ujikom'; ?></title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { display: flex; }
        #content { flex: 1; padding: 20px; background: #f8f9fa; min-height: 100vh; }
    </style>
</head>
<body>
