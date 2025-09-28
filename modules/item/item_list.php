<?php
// require '../../includes/config.php';
// session_start();
if (!isset($_SESSION['user_id'])) header("Location: ../../login.php");

$result = $mysqli->query("SELECT * FROM item ORDER BY id_item DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Item</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2>Daftar Item</h2>
<a href="index.php?page=item_add" class="btn btn-success mb-3">Tambah Item</a>
<table class="table table-bordered bg-white">
<thead>
<tr>
<th>ID</th>
<th>Nama Item</th>
<th>UOM</th>
<th>Harga Beli</th>
<th>Harga Jual</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['id_item'] ?></td>
<td><?= htmlspecialchars($row['nama_item']) ?></td>
<td><?= htmlspecialchars($row['uom']) ?></td>
<td><?= htmlspecialchars($row['harga_beli']) ?></td>
<td><?= htmlspecialchars($row['harga_jual']) ?></td>
<td>
<a href="index.php?page=item_edit&id=<?= $row['id_item'] ?>" class="btn btn-sm btn-primary">Edit</a>
<a href="index.php?page=item_delete&id=<?= $row['id_item'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
</body>
</html>
