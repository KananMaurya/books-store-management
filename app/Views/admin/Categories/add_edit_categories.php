
<div class="container mt-5">
    <h2 class="mb-4"><?php echo $title; ?></h2>
    <hr>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
       <?php if(!empty($publisher['id'])){ $action = admin_url('categories/save_categories/').$publisher['id']; }else{ $action = admin_url('categories/save_categories'); } ?>
    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="row g-3">

        <div class="col-md-6">
            <label class="form-label">Categories Name</label>
            <input type="text" name="name" class="form-control" required value="<?php echo $publisher['name'] ?? ''; ?>">
        </div>

         <div class="col-md-4">
            <label class="form-label">Status</label>
            <?php $is_active = $publisher['is_active'] ?? '';?>
            <select class="form-control" name="is_active">
                <option value="1" <?php if($is_active=='1'){echo "selected";}?>>Active</option>
                <option value="0" <?php if($is_active=='0'){echo "selected";}?>>InActive</option>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>

