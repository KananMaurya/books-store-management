<div class="container mt-2">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <a href="<?= admin_url('publisher/add_publisher'); ?>">
                <button class="btn btn-primary">Add New Publisher</button>
            </a>
        </div>
    </div>
    <hr>
    <table class="table table-bordered">
       <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Website</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
      
        </tbody>
    </table>
</div>
