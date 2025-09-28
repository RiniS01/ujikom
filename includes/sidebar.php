<div id="sidebar" class="bg-dark text-white vh-100 d-flex flex-column p-3" style="width:230px;">
    <h5 class="text-white mb-4">KOPERASI</h5>

    <!-- Menu utama -->
    <ul class="nav flex-column flex-grow-1">
        <!-- Dashboard -->
        <li>
            <a class="nav-link text-white" href="index.php?page=dashboard">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
        </li>

        <!-- Master Data -->
        <li>
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#masterMenu" role="button">
                <i class="bi bi-folder me-2"></i>Master
            </a>
            <ul class="collapse ps-3" id="masterMenu">
                <li><a class="nav-link text-white" href="index.php?page=customer_list">Customer</a></li>
                <li><a class="nav-link text-white" href="index.php?page=sales_list">Sales</a></li>
                <li><a class="nav-link text-white" href="index.php?page=item_list">Item</a></li>
                <!-- <li><a class="nav-link text-white" href="../../modules/customer/customer_list.php">It2em</a></li> -->
            </ul>
        </li>

        <!-- Transaksi -->
        <li>
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#transaksiMenu" role="button">
                <i class="bi bi-cash-stack me-2"></i>Transaksi
            </a>
            <ul class="collapse ps-3" id="transaksiMenu">
                <li><a class="nav-link text-white" href="transaction_invoice.php">Invoice</a></li>
                <li><a class="nav-link text-white" href="transaction_lampiran.php">Lampiran</a></li>
            </ul>
        </li>

        <!-- Admin Only -->
        <?php if($_SESSION['level'] == "Admin"): ?>
        <li>
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#adminMenu" role="button">
                <i class="bi bi-gear me-2"></i>Admin
            </a>
            <ul class="collapse ps-3" id="adminMenu">
                <li><a class="nav-link text-white" href="petugas_list.php">Petugas</a></li>
                <li><a class="nav-link text-white" href="level_list.php">Level</a></li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>

    <!-- Bagian bawah sidebar -->
    <div class="mt-auto">
        <hr class="border-light">
        <div class="mb-2">
            <span class="d-block fw-bold"><?= htmlspecialchars($_SESSION['user_name']); ?></span>
            <small class="text-muted"><?= htmlspecialchars($_SESSION['level']); ?></small>
        </div>
        <a href="logout.php" class="btn btn-sm btn-primary w-100">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
    </div>
</div>
