<?php
require 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Ambil ID customer dari query string
$id = $_GET['id'] ?? 0;

// Ambil data customer dari database
$stmt = $mysqli->prepare("SELECT * FROM customer WHERE id_customer=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$customer = $result->fetch_assoc();
$stmt->close();

if (!$customer) {
    die("Customer tidak ditemukan.");
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telepon'];
    $fax = $_POST['fax'];
    $email = $_POST['email'];

    $stmt = $mysqli->prepare("UPDATE customer SET nama_customer=?, alamat=?, telp=?, fax=?, email=? WHERE id_customer=?");
    $stmt->bind_param("sssssi", $nama, $alamat, $telp, $fax, $email, $id);

    if ($stmt->execute()) {
        header("Location: customer_list.php");
        exit;
    } else {
        echo "Gagal update: " . $stmt->error;
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Edit Customer</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($customer['nama_customer']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= htmlspecialchars($customer['alamat']); ?></textarea>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?= htmlspecialchars($customer['telp']); ?>">
        </div>
        <div class="mb-3">
            <label>Fax</label>
            <input type="text" name="fax" class="form-control" value="<?= htmlspecialchars($customer['fax']); ?>">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($customer['email']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="customer_list.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
