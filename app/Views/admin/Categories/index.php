<div class="container mt-2">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-2">
            <a href="<?= admin_url('categories/save_categories'); ?>">
                <button class="btn btn-primary">Add New Categories</button>
            </a>
        </div>
          <div class="col-3">
            <a href="<?= admin_url('categories/save_sub_categories'); ?>">
                <button class="btn btn-primary">Add New Sub-Categories</button>
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
            <?php if(!empty($publishers)){ foreach ($publishers as $publisher): ?>
                <tr>
                    <td><?= esc($publisher['name']) ?></td>
                    <td><?= esc($publisher['contact_email']) ?></td>
                    <td><?= esc($publisher['contact_phone']) ?></td>
                    <td>₹<?= esc($publisher['address']) ?></td>
                    <td><?= esc($publisher['website']) ?></td>
                    <td><?= ($publisher['is_active'] ?? 1) ? '<span style="color: #18bb18;">Active</span>' : '<span style="color:red;">Inactive</span>' ?></td>
                    <td><?= date('d M Y', strtotime($publisher['created_at'])) ?></td>
                    <td>
                        <a href="<?= admin_url('book/add_books/' . $publisher['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= admin_url('book/delete/' . $publisher['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; } ?>
        </tbody>
    </table>
</div>
