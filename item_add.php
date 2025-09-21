<?php
require 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_item'];
    $uom = $_POST['uom'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    $stmt = $mysqli->prepare("INSERT INTO item (nama_item, uom, harga_beli, harga_jual) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $nama, $uom, $harga_beli, $harga_jual);
    if ($stmt->execute()) header("Location: item_list.php");
    else echo "Gagal simpan: ".$stmt->error;
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Item</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2>Tambah Item</h2>
<form method="post">
<div class="mb-3">
<label>Nama Item</label>
<input type="text" name="nama_item" class="form-control" required>
</div>
<div class="mb-3">
<label>UOM</label>
<input type="text" name="uom" class="form-control">
</div>
<div class="mb-3">
<label>Harga Beli</label>
<input type="number" name="harga_beli" class="form-control" step="0.01">
</div>
<div class="mb-3">
<label>Harga Jual</label>
<input type="number" name="harga_jual" class="form-control" step="0.01">
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="item_list.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</body>
</html>
