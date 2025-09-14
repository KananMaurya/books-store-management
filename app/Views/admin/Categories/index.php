<div class="container mt-2">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-2 " >
            <a href="<?php //echo admin_url('categories/save_categories'); ?>" >
                <button class="btn btn-primary" disabled>Add New Categories</button>
            </a>
        </div>
          <div class="col-3">
            <a href="<?= admin_url('categories/save_sub_categories'); ?>">
                <button class="btn btn-primary">Add New Sub-Categories</button>
            </a>
        </div>
    </div>
    <hr>
    <h3>Sub Categories list </h3>
    <table class="table table-bordered">
       <thead>
            <tr>
                <th>Sub Categories Name</th>
                <th>Categories</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($listing)){ foreach ($listing as $list): ?>
                <tr>
                    <td><?= esc($list['sub_categories_name']) ?></td>
                    <td><?php echo get_categories_name($list['categories_id']); ?></td>
                    <td><?= ($list['is_active'] ?? 1) ? '<span style="color: #18bb18;">Active</span>' : '<span style="color:red;">Inactive</span>' ?></td>
                    <td><?= date('d M Y', strtotime($list['created_at'])) ?></td>
                    <td>
                        <a href="<?= admin_url('categories/save_sub_categories/' . $list['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= admin_url('categories/delete/' . $list['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; } ?>
        </tbody>
    </table>
</div>
