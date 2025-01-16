<div class="container ">
    <table class="table table-bordered bg-light mt-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= htmlspecialchars($admin['id']) ?></td>
                <td><?= htmlspecialchars($admin['fname']) ?></td>
                <td><?= htmlspecialchars($admin['lname']) ?></td>
                <td><?= htmlspecialchars($admin['email']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $pagination; ?>
