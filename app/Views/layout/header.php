<!DOCTYPE html>
<html>
<head>
  <title><?= $title ?? 'Customer Shop' ?></title>

   <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
  body { background-color: #f8f9fa; }
  .navbar-brand { font-weight: bold; font-size: 22px; }
  .nav-link { font-weight: 500; }
  .nav-link:hover { color: #ffc107 !important; }
  .dropdown-menu { border-radius: 12px; }
  .dropdown-item i { margin-right: 8px; }
  .bg-primary {
    --bs-bg-opacity: 1;
    background-color: rgb(147 25 25) !important; /* custom red */
  }
  /* force white text */
  .navbar .nav-link,
  .navbar .navbar-brand {
    color: #fff !important;
  }
</style>
 <link rel="stylesheet" href="<?= base_url('customer/style.css') ?>">
 <script src="<?= base_url('assets/js/common.js') ?>"></script>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url() ?>">Books Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
        <!-- Account Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="accountDropdown">
            <li><a class="dropdown-item" href="<?= site_url('customer/login') ?>"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
            <li><a class="dropdown-item" href="<?= site_url('customer/signup') ?>"><i class="bi bi-person-plus"></i> Sign Up</a></li>
            <li><a class="dropdown-item" href="<?= site_url('customer/forgot-password') ?>"><i class="bi bi-key"></i> Forgot Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= site_url('order/track') ?>"><i class="bi bi-truck"></i> Track Order</a></li>
            <li><a class="dropdown-item" href="<?= site_url('customer/account/settings') ?>"><i class="bi bi-gear"></i> Account Settings</a></li>
            <li><a class="dropdown-item" href="<?= site_url('customer/account/address') ?>"><i class="bi bi-geo-alt"></i> Your Address</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="<?= site_url('customer/logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </li>

        <!-- Cart -->
        <li class="nav-item">
          <a class="nav-link position-relative" href="<?= site_url('customer/cart') ?>">
            <i class="bi bi-cart" style="font-size: 20px;"></i> Cart
            <span id="total_cart" 
                  class="position-absolute top-1 start-110 translate-middle badge rounded-pill text-danger bg-white">
             <?php echo get_cart_count_by_ip(); ?>
            </span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
