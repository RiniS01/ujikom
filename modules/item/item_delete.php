<?php
// require '../../includes/config.php';
// session_start();
if (!isset($_SESSION['user_id'])) header("Location: ../../login.php");

$id = $_GET['id'] ?? 0;
$mysqli->query("DELETE FROM item WHERE id_item=$id");
header("Location:index.php?page=item_list");
exit;
