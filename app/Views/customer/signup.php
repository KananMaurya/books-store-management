
  <style>
    body {
      background: #f4f6f9;
    }
    .card {
      max-width: 500px;
      margin: 60px auto;
      border-radius: 12px;
    }
  </style>


<div class="card shadow">
  <div class="card-body">
    <h3 class="text-center mb-4">Register</h3>
    <div id="msg"></div> <!-- Response Messages -->
    <form id="registerForm" novalidate>
      <div class="mb-3">
        <label for="regName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="regName" name="name" required>
        <div class="invalid-feedback">Full Name is required.</div>
      </div>
      <div class="mb-3">
        <label for="regEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="regEmail" name="email" required>
        <div class="invalid-feedback">Please enter a valid email.</div>
      </div>
      <div class="mb-3">
        <label for="regPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="regPassword" name="password" required minlength="6">
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
      </div>
      <div class="mb-3">
        <label for="regConfirm" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="regConfirm" required>
        <div class="invalid-feedback">Passwords do not match.</div>
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
    </form>
    <p class="mt-3 text-center">Already have an account? <a href="<?= site_url('customer/login') ?>">Login</a></p>
  </div>
</div>

<script>
(function () {
  'use strict';
  const form = document.getElementById('registerForm');
  const password = document.getElementById('regPassword');
  const confirm = document.getElementById('regConfirm');
  const msgBox = $("#msg");

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    // Password match check
    if (password.value !== confirm.value) {
      confirm.setCustomValidity("Passwords do not match");
    } else {
      confirm.setCustomValidity("");
    }

    if (!form.checkValidity()) {
      event.stopPropagation();
      form.classList.add('was-validated');
      return;
    }

    // ✅ AJAX Request
    $.ajax({
      url: "your_controller/register", // <- yaha apna controller ka URL daalo
      method: "POST",
      data: $(form).serialize(),
      dataType: "json",
      beforeSend: function () {
        msgBox.html('<div class="alert alert-info">Please wait...</div>');
      },
      success: function (response) {
        if (response.status === "success") {
          msgBox.html('<div class="alert alert-success">'+response.message+'</div>');
          form.reset();
          form.classList.remove('was-validated');
        } else {
          msgBox.html('<div class="alert alert-danger">'+response.message+'</div>');
        }
      },
      error: function () {
        msgBox.html('<div class="alert alert-danger">Something went wrong, try again.</div>');
      }
    });
  }, false);
})();
</script>
