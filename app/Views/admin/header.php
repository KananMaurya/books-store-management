<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Book Store Admin' ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('admin/style.css') ?>">
</head>
<body>

  <!-- 🔹 Top Header -->
  <header class="topbar shadow-sm">
    <div class="logo"><i class="fa-solid fa-book"></i> Book Store</div>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user-circle me-2"></i>
        <span><?= session()->get('username') ?? 'Admin' ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow">
        <li><a class="dropdown-item" href="<?= base_url('admin/settings') ?>"><i class="fa-solid fa-gear"></i> Settings</a></li>
        <li><a class="dropdown-item" href="<?= base_url('admin/profile') ?>"><i class="fa-solid fa-user"></i> Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="<?= base_url('admin/logout') ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
      </ul>
    </div>
  </header>

  <!-- 🔹 Sidebar + Content Wrapper -->
  <div class="main-wrapper">
    <!-- Sidebar -->
    <aside class="sidebar">
      <nav class="nav flex-column">
        <a class="nav-link active" href="<?= base_url('admin/dashboard') ?>"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <a class="nav-link" href="<?= base_url('admin/book/listing') ?>"><i class="fa-solid fa-book"></i> Add Books</a>
        <a class="nav-link" href="<?= base_url('admin/categories') ?>"><i class="fa-solid fa-folder"></i> Categories</a>
        <a class="nav-link" href="<?= base_url('admin/publishers') ?>"><i class="fa-solid fa-building"></i> Publishers</a>

        <!-- Dropdown -->
        <div class="nav-item">
          <a class="nav-link d-flex justify-content-between align-items-center" 
             data-bs-toggle="collapse" 
             href="#promoMenu" 
             role="button">
            <span><i class="fa-solid fa-bullhorn"></i> Promotions</span>
            <i class="fa-solid fa-chevron-down small"></i>
          </a>
          <div class="collapse" id="promoMenu">
            <a class="nav-link ps-4" href="<?= base_url('admin/promotions/bestsellers') ?>"><i class="fa-solid fa-fire"></i> Bestsellers</a>
            <a class="nav-link ps-4" href="<?= base_url('admin/promotions/new-arrivals') ?>"><i class="fa-solid fa-star"></i> New Arrivals</a>
            <a class="nav-link ps-4" href="<?= base_url('admin/promotions/pre-orders') ?>"><i class="fa-solid fa-box"></i> Pre-Orders</a>
          </div>
        </div>

        <a class="nav-link" href="<?= base_url('admin/orders') ?>"><i class="fa-solid fa-file-lines"></i> Orders</a>
        <a class="nav-link" href="<?= base_url('admin/customers') ?>"><i class="fa-solid fa-users"></i> Customers</a>
        <a class="nav-link" href="<?= base_url('admin/blog') ?>"><i class="fa-solid fa-pen-to-square"></i> Blog</a>
        <a class="nav-link" href="<?= base_url('admin/print-on-demand') ?>"><i class="fa-solid fa-print"></i> Print-On-Demand</a>
        <a class="nav-link" href="<?= base_url('admin/app-settings') ?>"><i class="fa-solid fa-mobile-screen"></i> App Settings</a>
        <a class="nav-link" href="<?= base_url('admin/site-settings') ?>"><i class="fa-solid fa-globe"></i> Site Settings</a>
        <a class="nav-link" href="<?= base_url('admin/reports') ?>"><i class="fa-solid fa-chart-line"></i> Reports</a>
        <a class="nav-link text-danger" href="<?= base_url('admin/logout') ?>"><i class="fa-solid fa-user-shield"></i> Admin Profile & Logout</a>
      </nav>
    </aside>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
