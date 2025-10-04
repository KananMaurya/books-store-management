

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card shadow p-4">
        <h3 class="text-center mb-4">Track Your Order</h3>
        
        <!-- Track Order Form -->
        <form id="trackOrderForm">
          <div class="mb-3">
            <label for="order_id" class="form-label">Order ID</label>
            <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Enter your order ID">
            <div class="invalid-feedback">Please enter your order ID.</div>
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Registered Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            <div class="invalid-feedback">Please enter a valid email.</div>
          </div>
          
          <button type="submit" class="btn btn-primary w-100">Track Order</button>
        </form>
        
        <!-- Result Area -->
        <div id="orderResult" class="mt-4 text-center"></div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $("#trackOrderForm").on("submit", function(e) {
    e.preventDefault();
    
    let order_id = $("#order_id").val().trim();
    let email = $("#email").val().trim();
    let valid = true;

    // Validation
    if (order_id === "") {
      $("#order_id").addClass("is-invalid");
      valid = false;
    } else {
      $("#order_id").removeClass("is-invalid");
    }

    if (email === "" || !email.includes("@")) {
      $("#email").addClass("is-invalid");
      valid = false;
    } else {
      $("#email").removeClass("is-invalid");
    }

    if (!valid) return;

    // AJAX
    $.ajax({
      url: "controller/track_order", // 🔹 Change this to your controller URL
      type: "POST",
      data: { order_id: order_id, email: email },
      success: function(response) {
        $("#orderResult").html(
          `<div class="alert alert-success">Order Status: ${response}</div>`
        );
      },
      error: function() {
        $("#orderResult").html(
          `<div class="alert alert-danger">Unable to fetch order details. Please try again.</div>`
        );
      }
    });
  });
});
</script>
