

<div class="container mt-5">
    <div class="form-container" style="background-color: #fff; padding: 30px; border-radius: 8px;box-shadow: 0 0 10px rgba(0,0,0,0.1)">
        <h1>Ավելացնել նկար</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <?= get_csrf_field();?>
            <label for="image_name">Նկարի անվանումը</label>
            <input type="text" id="image_name" name="image_name" required><br><br>

            <label for="image">Ներբեռնել նկար</label>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>

            <button type="submit">Ուղարկել</button>
        </form>
        <?php
        session()->remove('form_data');
        session()->remove('form_errors');
        ?>
    </div>
</div>