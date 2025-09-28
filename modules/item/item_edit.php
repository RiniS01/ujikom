<?php
// require '../../includes/config.php';
// session_start();
if (!isset($_SESSION['user_id'])) header("Location: ../../login.php");

$id = $_GET['id'] ?? 0;
$stmt = $mysqli->prepare("SELECT * FROM item WHERE id_item=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();
$stmt->close();

if (!$item) die("Item tidak ditemukan.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_item'];
    $uom = $_POST['uom'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    $stmt = $mysqli->prepare("UPDATE item SET nama_item=?, uom=?, harga_beli=?, harga_jual=? WHERE id_item=?");
    $stmt->bind_param("ssddi", $nama, $uom, $harga_beli, $harga_jual, $id);
    if ($stmt->execute()) header("Location:index.php?page=item_list");
    else echo "Gagal update: ".$stmt->error;
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Item</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2>Edit Item</h2>
<form method="post">
<div class="mb-3">
<label>Nama Item</label>
<input type="text" name="nama_item" class="form-control" value="<?= htmlspecialchars($item['nama_item']); ?>" required>
</div>
<div class="mb-3">
<label>UOM</label>
<input type="text" name="uom" class="form-control" value="<?= htmlspecialchars($item['uom']); ?>">
</div>
<div class="mb-3">
<label>Harga Beli</label>
<input type="number" name="harga_beli" class="form-control" step="0.01" value="<?= htmlspecialchars($item['harga_beli']); ?>">
</div>
<div class="mb-3">
<label>Harga Jual</label>
<input type="number" name="harga_jual" class="form-control" step="0.01" value="<?= htmlspecialchars($item['harga_jual']); ?>">
</div>
<button type="submit" class="btn btn-primary">Update</button>
<a href="index.php?page=item_list" class="btn btn-secondary">Batal</a>
</form>
</div>
</body>
</html>
