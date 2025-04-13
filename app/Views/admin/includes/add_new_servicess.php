
<div class="container">
    <h1> <?=$title ?? '';?></h1>
    <div class="form-container" style="background-color: #fff; padding: 30px; border-radius: 8px;box-shadow: 0 0 10px rgba(0,0,0,0.1)">
        <h2 class="mb-4">Ավելացնել նոր ծառայություններ</h2>
        <form action="" method="POST">
            <?= get_csrf_field();?>
            <div class="mb-3">
                <label for="name" class="form-label">Ծառայության անվանումը</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="editor" class="form-label">Ծառայության նկարագրությունը</label>
                <textarea class="form-control" id="editor" name="description" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Ծառայության գինը (ՀՀ դրամով)</label><br>
                Սկսած
                <input type="number" class="form-control" id="price" name="price_1" required>
                Մինչև
                <input type="number" class="form-control" id="price" name="price_2">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Կատեգորիայի անվանումը</label>
                <select class="form-select" id="category" name="category">
                    <option value="1">Իմպլանտացիա</option>
                    <option value="2">Օրթոդոնտիա</option>
                    <option value="3">Օրթոպեդիա</option>
                    <option value="4">Թերապիա</option>
                    <option value="5">Էսթետիկ ատամնաբուժություն</option>
                    <option value="6">Վիրաբուժություն</option>
                </select>
            </div>

            <input class="btn btn-primary" type="submit" value="Ավելացնել ծառայություն" name="submit">
        </form>
        <?php
        session()->remove('form_data');
        session()->remove('form_errors');
        ?>
    </div>
</div>
