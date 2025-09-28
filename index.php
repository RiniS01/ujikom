<?php
// session_start();
require_once "includes/header.php";
require_once "includes/sidebar.php";
include "includes/config.php";

   if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
    }

?>

<!-- <div class="content" style="margin-left:240px; padding:20px;"> -->
    <?php
    $page = $_GET['page'];
    
    switch ($page) {
        case "dashboard":
            include "dashboard.php";
            break;
        case "customer_list":
            include "modules/customer/customer_list.php";
            break;
        case "customer_add":
            include "modules/customer/customer_add.php";
            break;
        case "customer_edit":
            include "modules/customer/customer_edit.php";
            break;
        case "customer_delete":
            include "modules/customer/customer_delete.php";
            break;
        case "sales_list":
            include "modules/sales/sales_list.php";
            break;
        case "sales_add":
            include "modules/sales/sales_add.php";
            break;
        case "sales_edit":
            include "modules/sales/sales_edit.php";
            break;
        case "sales_delete":
            include "modules/sales/sales_delete.php";
            break;
        case "item_list":
            include "modules/item/item_list.php";
            break;
        case "item_add":
            include "modules/item/item_add.php";
            break;
        case "item_edit":
            include "modules/item/item_edit.php";
            break;
        case "item_delete":
            include "modules/item/item_delete.php";
            break;
        default:
            include "dashboard.php";
    }



    // if (isset($_GET['page'])) {
    //     $page = $_GET['page'];
    //     $type = $_GET['type'];
    //     $file = "modules/$page/{$page}_{$type}.php";

    //     if (file_exists($file)) {
    //         include $file;
    //     } else {
    //         echo "<h3>Halaman tidak ditemukan</h3>";
    //     }
    // } else {
    //     echo "<h1>Selamat datang di Dashboard</h1>";
    // }
    ?>
<!-- </div> -->

<?php include "includes/footer.php"; ?>
