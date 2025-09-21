<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">

        <!-- Master / User Account -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Master / User Account
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="customer_list.php">Customer</a></li>
            <li><a class="dropdown-item" href="sales_list.php">Sales</a></li>
            <li><a class="dropdown-item" href="item_list.php">Item</a></li>
          </ul>
        </li>

        <!-- Invoice -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Invoice
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="transaction_invoice.php">Data Invoice</a></li>
          </ul>
        </li>

        <!-- Lampiran -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Lampiran
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="transaction_lampiran.php">Data Lampiran</a></li>
          </ul>
        </li>

        <!-- Admin Only -->
        <?php if($_SESSION['level'] == "Admin"): ?>
        <li class="nav-item"><a class="nav-link" href="petugas_list.php">Petugas</a></li>
        <li class="nav-item"><a class="nav-link" href="level_list.php">Level</a></li>
        <?php endif; ?>

      </ul>

      <span class="navbar-text">
        <?= htmlspecialchars($_SESSION['user_name']); ?> (<?= $_SESSION['level']; ?>)
        <a href="logout.php" class="btn btn-sm btn-light ms-2">Logout</a>
      </span>
    </div>
  </div>
</nav>

<!-- Content Area -->
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h3>Selamat Datang, <?= htmlspecialchars($_SESSION['user_name']); ?> 👋</h3>
        <p>Level: <?= htmlspecialchars($_SESSION['level']); ?></p>
        <p>Pilih menu di atas untuk mengelola data.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
