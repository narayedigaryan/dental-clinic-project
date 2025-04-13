<div class="container mb-5">

    <table class="table table-bordered bg-light table-responsive" id="dataTable">
        
        <thead>
        <tr style="width: 15px">
            <th rowspan="2">Հ/հ</th>
            <th rowspan="2">Անուն</th>
            <th rowspan="2">Ազգանուն</th>
            <th rowspan="2">Տարիք</th>
            <th rowspan="2">Հեռ․ համար</th>
            <th colspan="2">Բժշկական պատմություն</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($patients as $key => $patient): ?>
            <tr style="height: 20px">
                <td style="height: 20px"><?= $key + 1 ?></td>
                <td><?= htmlspecialchars($patient['first_name']); ?></td>
                <td><?= htmlspecialchars($patient['last_name']); ?></td>
                <td><?= htmlspecialchars($patient['age']); ?></td>
                <td><?= htmlspecialchars($patient['contact']); ?></td>
                <td><?= htmlspecialchars($patient['medical-history']); ?></td>
                <td>
                    <form action="<?= base_url('/delete_patient/' . $patient['id']); ?>" method="POST">
                        <?= get_csrf_field();?>

                        <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
