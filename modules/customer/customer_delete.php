<?php
// require '../../includes/config.php';
// session_start();
if (!isset($_SESSION['user_id'])) header("Location: ../../login.php");

$id = $_GET['id'] ?? 0;
$mysqli->query("DELETE FROM customer WHERE id_customer=$id");
header("Location: index.php?page=customer_list");
exit;
