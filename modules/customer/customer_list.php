<?php
// require '../../includes/config.php';
// include "../../includes/header.php";
// include "../../includes/sidebar.php";
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: ../../login.php");
//     exit;
// }

$result = $mysqli->query("SELECT * FROM customer ORDER BY id_customer DESC");
?>
<!-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> -->
<div class="container mt-5">
    <h2>Daftar Customer</h2>
    <a href="index.php?page=customer_add"class="btn btn-success mb-3">Tambah Customer</a>
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Fax</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_customer'] ?></td>
                <td><?= htmlspecialchars($row['nama_customer']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td><?= htmlspecialchars($row['telp']) ?></td>
                <td><?= htmlspecialchars($row['fax']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <a href="index.php?page=customer_edit&id=<?= $row['id_customer'] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="index.php?page=customer_delete&id=<?= $row['id_customer'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php 
// include "../../includes/footer.php"; 
?>
