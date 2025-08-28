
<div class="container mt-5">
    <h2 class="mb-4">Add Book</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
       <?php if(!empty($book['product_id'])){ $action = admin_url('book/add_books/').$book['product_id']; }else{ $action = admin_url('book/add_books'); } ?>
    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="row g-3">

        <div class="col-md-6">
            <label class="form-label">Book Name</label>
            <input type="text" name="name" class="form-control" required value="<?php echo $book['name'] ?? ''; ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="<?php echo $book['slug'] ?? ''; ?>">
        </div>

        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?php echo $book['description'] ?? ''; ?></textarea>
        </div>

         <div class="col-md-6">
            <label class="form-label">Writer</label>
            <select name="writer" class="form-control" required>
                <option value="">Select Writer</option>
                <?php foreach ($writers as $writer): $match_W = $book['writer_id'] ?? ''; ?>
                    <option <?php if($writer['id']==$match_W){ echo "selected";} ?> value="<?=  $writer['id']; ?>"><?=  $writer['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="col-md-6">
            <label class="form-label">Publisher</label>
           <select name="publisher" class="form-control" required>
                <option value="">Select Publisher</option>
                <?php foreach ($publishers as $publisher): $match_p = $book['publisher_id'] ?? '';?>
                    <option  <?php if($publisher['id']==$match_p){ echo "selected";} ?> value="<?=  $publisher['id']; ?>"><?=  $publisher['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Language</label>
            <input type="text" name="language" class="form-control" value="<?php echo $book['language'] ?? ''; ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" value="<?php echo $book['isbn'] ?? ''; ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">Format</label>
            <input type="text" name="format" class="form-control" value="<?php echo $book['format'] ?? ''; ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">Tax</label>
             <select name="tax_id" class="form-control" required>
                <option value="">Select Tax</option>
                <?php foreach ($taxs as $tax): $match_T = $book['tax_id'] ?? ''; ?>
                    <option  <?php if($tax['id']==$match_T){ echo "selected";} ?> value="<?=  $tax['id']; ?>"><?=  $tax['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Sell Price</label>
            <input type="number" step="0.01" name="sell_price" class="form-control" value="<?= esc($book['sell_price'] ?? '') ?>" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Cost Price</label>
            <input type="number" step="0.01" name="cost_price" class="form-control" value="<?= esc($book['cost_price'] ?? '') ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">Discount (%)</label>
            <input type="number" step="0.01" name="discount" class="form-control" value="<?= esc($book['discount'] ?? '') ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">Coupon</label>
            <input type="text" name="coupone" class="form-control" value="<?= esc($book['coupone'] ?? '') ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">Stock Quantity</label>
            <input type="number" name="stock_quantity" class="form-control" value="<?= esc($book['stock_quantity'] ?? '') ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">SKU</label>
            <input type="text" name="sku" class="form-control"  value="<?= esc($book['sku'] ?? '') ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">Barcode</label>
            <input type="text" name="barcode" class="form-control" value="<?= esc($book['barcode'] ?? '') ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label">Image</label>
            <?php if(!empty($book['image'])){ ?>
           <img src="<?= base_url('uploads/' . $book['image']) ?? '' ?>" width="100">

            <?php }else{?>
            <input type="file" name="image" class="form-control">
           <?php } ?>

        </div>

        <div class="col-md-8">
            <label class="form-label">Video URL</label>
          
             <?php if(!empty($book['video_url'])){ ?>
           <img src="<?= base_url('uploads/' . $book['video_url']) ?? '' ?>" width="150">

            <?php }else{?>
              <input type="text" name="video_url" class="form-control">
           <?php } ?>
        </div>

        <div class="col-md-4">
            <label class="form-label">Weight</label>
            <input type="text" name="weight" class="form-control"  value="<?= esc($book['weight'] ?? '') ?>">
        </div>
         <div class="col-md-4">
            <label class="form-label">Status</label>
            <?php $is_active = $book['is_active'] ?? '';?>
            <select class="form-control" name="is_active">
                <option value="1" <?php if($is_active=='1'){echo "selected";}?>>Active</option>
                <option value="0" <?php if($is_active=='0'){echo "selected";}?>>InActive</option>
            </select>
        </div>
    <!--
        <div class="col-md-4">
            <label class="form-label">Dimensions</label>
            <input type="text" name="dimensions" class="form-control">
        </div>

         <div class="col-md-4">
            <label class="form-label">Warranty</label>
            <input type="text" name="warranty" class="form-control">
        </div>

        <div class="col-12">
            <label class="form-label">Delivery Info</label>
            <textarea name="delivery_info" class="form-control" rows="2"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Category ID</label>
            <input type="number" name="category_id" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Sub-category ID</label>
            <input type="number" name="sub_category_id" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Tags (comma separated)</label>
            <input type="text" name="tags" class="form-control">
        </div>

        <div class="col-12">
            <label class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="2"></textarea>
        </div> -->

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>

