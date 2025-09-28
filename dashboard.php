<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

$title = "Dashboard";
// include "includes/config.php";
// include "includes/header.php";   // <head> + awal <body>
// include "includes/sidebar.php";  // sidebar kiri
?>

<!-- Konten utama -->
<div id="content">
    <div class="card shadow-lg p-4">
        <h3>Selamat Datang, <?= htmlspecialchars($_SESSION['user_name']); ?> 👋</h3>
        <p>Level: <?= htmlspecialchars($_SESSION['level']); ?></p>
        <p>Pilih menu di sidebar untuk mengelola data.</p>
    </div>
</div>

<?php 
// include "includes/footer.php"; 
?>
