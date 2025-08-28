<div class="container mt-2">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <a href="<?= admin_url('book/add_books'); ?>">
                <button class="btn btn-primary">Add New Book</button>
            </a>
        </div>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Writer</th>
                <th>Publisher</th>
                <th>Sell Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Language</th>
                <th>Added At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= esc($book['name']) ?></td>
                    <td><?= esc($book['writer_name']) ?></td>
                    <td><?= esc($book['publisher_name']) ?></td>
                    <td>₹<?= esc($book['sell_price']) ?></td>
                    <td><?= esc($book['stock_quantity']) ?></td>
                    <td><?= ($book['is_active'] ?? 1) ? '<span style="color: #18bb18;">Active</span>' : '<span style="color:red;">Inactive</span>' ?></td>
                    <td><?= esc($book['language']) ?></td>
                    <td><?= date('d M Y', strtotime($book['added_to'])) ?></td>
                    <td>
                        <a href="<?= admin_url('book/add_books/' . $book['product_id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= admin_url('book/delete/' . $book['product_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
