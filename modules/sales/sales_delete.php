<?php
// require '../../includes/config.php';
// session_start();
if (!isset($_SESSION['user_id'])) header("Location: ../../login.php");

$id = $_GET['id'];
$mysqli->query("DELETE FROM sales WHERE id_sales=$id");
header("Location:index.php?page=sales_list");
exit;
?>
