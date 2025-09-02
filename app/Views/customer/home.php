
<div class="container py-5">
  <div class="row row-cols-1 row-cols-md-6 g-4">

    <!-- Book Card 1 -->
    <div class="col">
      <div class="card book-card position-relative">
        <span class="badge bg-warning text-dark badge-custom">BESTSELLER</span>
        <img src="<?php echo base_url('uploads/book_store_image/Nirmala.jpg'); ?>" class="card-img-top" alt="Atomic Habits">
        <div class="card-body d-flex flex-column">
          <div class="rating">4.2 / 5 ⭐ (27)</div>
          <h6 class="card-title mt-1">Atomic Habits</h6>
          <p class="text-muted mb-2">James Clear</p>
          <div class="mb-2">
            <span class="price">₹598</span>
            <span class="original-price">₹899</span>
            <span class="discount">(33.48%)</span>
          </div>
          <div class="btn-group">
            <button class="btn btn-outline-secondary"><i class="bi bi-heart"></i></button>
            <button class="btn btn-danger w-100 ms-2">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>

    

    <?php if(!empty($books)){ foreach($books as $book) { ?>
      
    <div class="col">
  <div class="card book-card position-relative">
    <span class="badge bg-info text-dark badge-custom">POPULAR</span>

    <div class="image-container position-relative">
      <img src="<?php echo base_url('uploads/' . $book['image']); ?>" class="card-img-top" alt="Book">

      <!-- Quick View Overlay -->
      <div class="quick-view-overlay d-flex align-items-center justify-content-center"
           onclick="show_pop(<?php echo $book['product_id']; ?>);">
        <span class="text-white fw-bold">Quick View</span>
      </div>
    </div>

    <div class="card-body d-flex flex-column">
      <div class="rating"><?php echo $book['rating']; ?> / 5 ⭐ (30)</div>
      <h6 class="card-title mt-1"><?php echo $book['name']; ?></h6>
      <p class="text-muted mb-2"><?php echo $book['writer_name']; ?></p>
      <div class="mb-2">
        <span class="price">₹<?php echo $book['sell_price']; ?></span>
        <span class="discount">(<?php echo $book['discount']; ?>%)</span>
      </div>
      <div class="btn-group">
        <button class="btn btn-outline-secondary"><i class="bi bi-heart"></i></button>
        <button class="btn btn-danger w-100 ms-2" onclick="add_to_cart(<?php echo $book['product_id']; ?>);">Add to Cart</button>
      </div>
    </div>
  </div>
</div>

<?php } } ?>
</div>

  <!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="quickViewLabel">Book Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="quickViewContent">
        <!-- Book details will load here -->
        <div class="text-center text-muted">Loading...</div>
      </div>
    </div>
  </div>
</div>

</div>
<style>
  .image-container {
  position: relative;
  overflow: hidden;
}

.quick-view-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 0;
  background: rgba(255, 0, 0, 0.7);
  color: #fff;
  text-align: center;
  font-size: 18px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  overflow: hidden;
}

.image-container:hover .quick-view-overlay {
  height: 55px; /* aapke requirement ke hisaab se */
}

</style>
<script>
function show_pop(product_id) {
    // Modal open karo
    var myModal = new bootstrap.Modal(document.getElementById('quickViewModal'));
    myModal.show();

    // Loading message
    document.getElementById("quickViewContent").innerHTML = `
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `;
    // AJAX se book detail fetch karo (JSON expected)
    fetch("<?php echo base_url('customer/book/get_book_detail/'); ?>" + product_id)
        .then(response => response.json())
        .then(data => {
            if(data.error){
                document.getElementById("quickViewContent").innerHTML = "<div class='text-danger'>"+data.error+"</div>";
                return;
            }

            // Dynamic HTML
         var html = `
          <div class="row">
              <div class="col-md-5 text-center">
                  <img src="<?php echo base_url('uploads/'); ?>${data.image}" class="img-fluid" alt="${data.name}">
              </div>
              <div class="col-md-7">
                  <h5>${data.name}</h5>
                  <p><strong>Writer:</strong> ${data.writer_name || 'N/A'}</p>
                  <p><strong>Language:</strong> ${data.language || 'N/A'}</p>
                  <p><strong>Price:</strong> <span style="color:green;">₹${data.sell_price}</span></p>
                  <p><strong>Discount:</strong> ${data.discount}%</p>
                  <p><strong>Rating:</strong> ${data.rating} ⭐</p>
                  <p><strong>Description:</strong> ${data.description}</p>
                  
                  <!-- Quantity Selector -->
                  <div class="mb-2">
                      <label for="quantity_${data.product_id}"><strong>Quantity:</strong></label>
                      <input type="number" id="quantity_${data.product_id}" value="1" min="1" class="form-control" style="width:80px; display:inline-block; margin-left:10px;">
                  </div>

                  <!-- Buttons -->
                  <button class="btn btn-danger mt-2" onclick="add_to_cart(${data.product_id}, document.getElementById('quantity_${data.product_id}').value);">Add to Cart</button>
                  <button class="btn btn-success mt-2" onclick="buy_now(${data.product_id}, document.getElementById('quantity_${data.product_id}').value);">Buy Now</button>
                  <button class="btn btn-primary mt-2" onclick="more_books();">More Books</button>
              </div>
          </div>
      `;


            document.getElementById("quickViewContent").innerHTML = html;
        })
        .catch(error => {
            document.getElementById("quickViewContent").innerHTML = "<div class='text-danger'>Error loading data.</div>";
            console.error("Error:", error);
        });
}

</script>
