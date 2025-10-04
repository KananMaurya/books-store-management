
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
    <h3 class="text-center mb-4">Forgot Password</h3>
    <div id="forgotMsg"></div> <!-- Response Messages -->
    <form id="forgotForm" novalidate>
      <div class="mb-3">
        <label for="forgotEmail" class="form-label">Enter your registered Email</label>
        <input type="email" class="form-control" id="forgotEmail" name="email" required>
        <div class="invalid-feedback">Please enter a valid email address.</div>
      </div>
      <button type="submit" class="btn btn-warning w-100">Send Reset Link</button>
    </form>
    <p class="mt-3 text-center">
      Remembered password? <a href="<?= site_url('customer/login') ?>">Login</a>
    </p>
  </div>
</div>

<script>
(function () {
  'use strict';
  const form = document.getElementById('forgotForm');
  const msgBox = $("#forgotMsg");

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    if (!form.checkValidity()) {
      event.stopPropagation();
      form.classList.add('was-validated');
      return;
    }

    // ✅ AJAX Request
    $.ajax({
      url: "your_controller/forgot_password", // <-- apna controller ka URL daalo
      method: "POST",
      data: $(form).serialize(),
      dataType: "json",
      beforeSend: function () {
        msgBox.html('<div class="alert alert-info">Processing request...</div>');
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
        msgBox.html('<div class="alert alert-danger">Server error, please try again.</div>');
      }
    });
  }, false);
})();
</script>
