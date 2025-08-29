
<div class="container mt-5">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
       <?php if(!empty($book['id'])){ $action = admin_url('categories/add_categories/').$book['id']; }else{ $action = admin_url('categories/add_categories'); } ?>
    <form action="<?= $action ?>" method="post"  class="row g-3">

        <div class="col-md-6">
            <label class="form-label"> Name</label>
            <input type="text" name="name" class="form-control" required value="<?php echo $book['name'] ?? ''; ?>">
        </div>


        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?php echo $book['description'] ?? ''; ?></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>

