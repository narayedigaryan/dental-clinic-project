<div class="container mb-5">

    <table class="table table-bordered bg-light table-responsive" border="1" id="dataTable">
        <caption class="font-italic text-center text-primary w-100" style="display: block">Մեր կողմից մատուցվող
            ծառայությունները և գնացուցակը
        </caption>
        <thead>
        <tr style="width: 15px">
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
        <?php foreach ($treatments as $key => $treatment): ?>
            <tr style="height: 20px">
                <td style="height: 20px"><?= $key + 1 ?></td>
                <td><?= htmlspecialchars($treatment['name']); ?></td>
                <td><?= htmlspecialchars($treatment['description']); ?></td>
                <td><?= htmlspecialchars($treatment['price_1']); ?></td>
                <td><?= htmlspecialchars($treatment['price_2']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
