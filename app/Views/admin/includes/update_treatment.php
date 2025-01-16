
<div class="container">
    <h1> <?=$title ?? '';?></h1>
    <h1>Edit Treatment</h1>
    <form action="<?= base_url('/update_treatment/' . $treatment->id); ?>" method="POST">
        <?= get_csrf_field();?>
        <input type="hidden" value="<?php echo htmlspecialchars($treatment->id);?>" name="id">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($treatment->name); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required><?= htmlspecialchars($treatment->description); ?></textarea>
        </div>
        <div class="form-group">
            <label for="price_1">Price (Start)</label>
            <input type="number" name="price_1" id="price_1" class="form-control" value="<?= htmlspecialchars($treatment->price_1); ?>" required>
        </div>
        <div class="form-group">
            <label for="price_2">Price (End)</label>
            <input type="number" name="price_2" id="price_2" class="form-control" value="<?= htmlspecialchars($treatment->price_2); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= base_url('/admin');?>" class="btn btn-secondary">Cancel</a>
        </form>
        <?php

        ?>
    </div>
</div>
