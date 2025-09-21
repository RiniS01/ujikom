<?php
require 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_sales = $_POST['tgl_sales'];
    $id_customer = $_POST['id_customer'];
    $do_number = $_POST['do_number'];
    $status = $_POST['status'];
    $id_user = $_POST['id_user'];

    $stmt = $mysqli->prepare("INSERT INTO sales (tgl_sales, id_customer, do_number, status, id_user) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sissi", $tgl_sales, $id_customer, $do_number, $status, $id_user);
    if($stmt->execute()){
        header("Location: sales_list.php");
        exit;
    } else {
        echo "Gagal: " . $stmt->error;
    }
    $stmt->close();
}

// Ambil data customer & petugas untuk dropdown
$customers = $mysqli->query("SELECT * FROM customer ORDER BY nama_customer");
$petugas = $mysqli->query("SELECT * FROM petugas ORDER BY nama_user");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Sales</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2>Tambah Sales</h2>
<form method="post" action="">
<div class="mb-3">
<label>Tanggal Sales</label>
<input type="date" name="tgl_sales" class="form-control" required>
</div>

<div class="mb-3">
<label>Customer</label>
<select name="id_customer" class="form-control" required>
<option value="">-- Pilih Customer --</option>
<?php while($c=$customers->fetch_assoc()): ?>
<option value="<?= $c['id_customer'] ?>"><?= htmlspecialchars($c['nama_customer']) ?></option>
<?php endwhile; ?>
</select>
</div>

<div class="mb-3">
<label>DO Number</label>
<input type="text" name="do_number" class="form-control" required>
</div>

<div class="mb-3">
<label>Status</label>
<input type="text" name="status" class="form-control" required>
</div>

<div class="mb-3">
<label>Petugas</label>
<select name="id_user" class="form-control" required>
<option value="">-- Pilih Petugas --</option>
<?php while($p=$petugas->fetch_assoc()): ?>
<option value="<?= $p['id_user'] ?>"><?= htmlspecialchars($p['nama_user']) ?></option>
<?php endwhile; ?>
</select>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="sales_list.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</body>
</html>
