
  <style>
    body {
      background: #f4f6f9;
    }
    .card {
      max-width: 400px;
      margin: 80px auto;
      border-radius: 12px;
    }
  </style>


<div class="card shadow">
  <div class="card-body">
    <h3 class="text-center mb-4">Login</h3>
    <div id="loginMsg"></div> <!-- Response Messages -->
    <form id="loginForm" novalidate>
      <div class="mb-3">
        <label for="loginEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="loginEmail" name="email" required>
        <div class="invalid-feedback">Please enter a valid email.</div>
      </div>
      <div class="mb-3">
        <label for="loginPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="loginPassword" name="password" required minlength="6">
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <div  class="mt-3 text-center">
      <p>Don’t have an account? <a href="<?= site_url('customer/signup') ?>">Register</a></p>
     <p> <a href="<?= site_url('customer/forgot-password') ?>">Forgot Password?</a> </p>
    </div>
   
  </div>
</div>

<script>
(function () {
  'use strict';
  const form = document.getElementById('loginForm');
  const msgBox = $("#loginMsg");

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    if (!form.checkValidity()) {
      event.stopPropagation();
      form.classList.add('was-validated');
      return;
    }

    // ✅ AJAX Request
    $.ajax({
      url: "your_controller/login", // <-- apna controller ka URL daalo
      method: "POST",
      data: $(form).serialize(),
      dataType: "json",
      beforeSend: function () {
        msgBox.html('<div class="alert alert-info">Checking credentials...</div>');
      },
      success: function (response) {
        if (response.status === "success") {
          msgBox.html('<div class="alert alert-success">'+response.message+'</div>');
          // Redirect agar zarurat ho
          setTimeout(() => {
            window.location.href = "dashboard.html"; // apna page daalo
          }, 1500);
        } else {
          msgBox.html('<div class="alert alert-danger">'+response.message+'</div>');
        }
      },
      error: function () {
        msgBox.html('<div class="alert alert-danger">Server error, please try again.</div>');
      }
    });
  }, false);
})();
</script>
