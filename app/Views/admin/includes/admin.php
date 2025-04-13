<div class="container">

<table class="table table-bordered bg-light mt-5 table-responsive table-hover" border="1">
    <thead>
    <tr style="width: 15px">
        <th rowspan="2">Հ/հ</th>
        <th rowspan="2">Ծառայության անվանում</th>
        <th rowspan="2">Ծառայության նկարագրություն</th>
        <th colspan="2">Ծառայությունների գինը (ՀՀ դրամ)</th>
        <th colspan="2" rowspan="2">Գործողություններ</th>

    </tr>
    <tr>

        <th>Սկսած</th>
        <th>Մինչև</th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <?php foreach ($treatments as $key=>$treatment): ?>
            <tr style="height: 20px">
                <td style="height: 20px"><?= $key+1 ?></td>
                <td><?= htmlspecialchars($treatment['name']); ?></td>
                <td><?= htmlspecialchars($treatment['description']); ?></td>
                <td><?= htmlspecialchars($treatment['price_1']); ?></td>
                <td><?= htmlspecialchars($treatment['price_2']); ?></td>
        <td>
            <!-- Update Button -->
            <a href="<?= base_url('/update_treatment/' . $treatment['id']); ?>" class="btn btn-primary btn-sm" >Update</a>

        </td>

        <td>
            <form action="<?= base_url('/delete_treatment/' . $treatment['id']); ?>" method="POST">
                <?= get_csrf_field();?>

                <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
            </form>

        </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
