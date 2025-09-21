<?php
require 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

$id = $_GET['id'] ?? 0;
$mysqli->query("DELETE FROM item WHERE id_item=$id");
header("Location: item_list.php");
exit;
