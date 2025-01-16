<div class="container">
    <table class="table table-bordered bg-light mt-5">

<table border="1">
    <thead>
    <tr >
        <th rowspan="2">Հ/հ</th>
        <th rowspan="2">Ծառայության անվանում</th>
        <th rowspan="2">Ծառայության նկարագրություն</th>
        <th colspan="2">Ծառայությունների գինը (ՀՀ դրամ)</th>

    </tr>
    <tr>

        <th>Սկսած</th>
        <th>Մինչև</th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <?php foreach ($treatments as $treatment): ?>
            <tr>
                <td><?= htmlspecialchars($treatment['id']) ?></td>
                <td><?= htmlspecialchars($treatment['name']) ?></td>
                <td><?= htmlspecialchars($treatment['description']) ?></td>
                <td><?= htmlspecialchars($treatment['price_1']) ?></td>
                <td><?= htmlspecialchars($treatment['price_2']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
