<?php
// require '../../includes/config.php';
// session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

// Ambil data sales + customer + petugas
$sql = "SELECT s.id_sales, s.tgl_sales, s.do_number, s.status, 
               c.nama_customer, p.nama_user AS petugas_name
        FROM sales s
        JOIN customer c ON s.id_customer = c.id_customer
        JOIN users p ON s.id_user = p.id_user
        ORDER BY s.id_sales DESC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>List Sales</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<h2>List Sales</h2>
<a href="index.php?page=sales_add" class="btn btn-primary mb-3">Tambah Sales</a>

<table class="table table-bordered bg-white">
<thead>
<tr>
<th>ID</th>
<th>Tanggal</th>
<th>DO Number</th>
<th>Status</th>
<th>Customer</th>
<th>Petugas</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['id_sales'] ?></td>
<td><?= $row['tgl_sales'] ?></td>
<td><?= htmlspecialchars($row['do_number']) ?></td>
<td><?= htmlspecialchars($row['status']) ?></td>
<td><?= htmlspecialchars($row['nama_customer']) ?></td>
<td><?= htmlspecialchars($row['petugas_name']) ?></td>
<td>
<a href="index.php?page=sales_edit&id=<?= $row['id_sales'] ?>" class="btn btn-sm btn-warning">Edit</a>
<a href="index.php?page=sales_delete&id=<?= $row['id_sales'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus sales ini?')">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
</body>
</html>
