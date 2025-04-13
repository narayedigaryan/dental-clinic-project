<div class="container ">
    <table class="table table-bordered bg-light mt-5">
        <thead>
        <tr>
            <th>N</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($admins as $key=>$admin): ?>
            <tr>
                <td><?= $key+1 ?></td>
                <td><?= htmlspecialchars($admin['fname']) ?></td>
                <td><?= htmlspecialchars($admin['lname']) ?></td>
                <td><?= htmlspecialchars($admin['email']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div style="margin-left: 250px"> <?= $pagination; ?></div>
