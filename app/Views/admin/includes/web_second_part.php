<div class="container">
    <h1> <?=$title ?? '';?></h1>
    <div class="form-container bg-light" style="background-color: #fff; padding: 30px; border-radius: 8px;box-shadow: 0 0 10px rgba(0,0,0,0.1)">
        <h2 class="mb-4">Ավելացնել նոր ծառայություններ</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <?= get_csrf_field();?>
            <div class="mb-3">
                <label for="name" class="form-label">Ծառայության անվանումը</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="editor" class="form-label">Ծառայության նկարագրությունը</label>
                <textarea class="form-control" id="editor" name="description"></textarea>
            </div>

            <label for="image_name">Ներբեռնել նկար</label>
            <input type="file" id="image_name" name="image_name" accept="image/*" required><br><br>

            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ավելացնել
            </button>
        </form>

        <?php
        session()->remove('form_data');
        session()->remove('form_errors');
        ?>
    </div>
</div>