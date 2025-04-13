<style>
    .list-group-item:hover {
        background-color: #f8f9fa;
        transform: scale(1.02);
        transition: all 0.2s ease-in-out;
    }
</style>
<div class="container mt-4">
    <h2 class="mb-4">Manage Comments</h2>

    <div class="list-group">
        <?php foreach ($comments as $comment): ?>
            <div class="list-group-item shadow-sm p-3 mb-3 bg-white rounded">
                <h5 class="fw-bold"><?= htmlspecialchars($comment['name']) ?></h5>
                <p class="mb-2"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

                <!-- Show Reply if exists -->
                <?php if (!empty($comment['reply'])): ?>
                    <div class="alert alert-success p-2">
                        <strong>Admin Reply:</strong> <?= nl2br(htmlspecialchars($comment['reply'])) ?>
                    </div>
                <?php endif; ?>

                <!-- Admin Reply Form -->
                <form action="" method="POST">
                    <?= get_csrf_field();?>

                    <input type="hidden" name="id" value="<?= htmlspecialchars($comment['id']) ?>">

                    <label for="reply" class="form-label">Reply:</label>
                    <textarea class="form-control mb-2" name="reply" rows="2"><?= htmlspecialchars($comment['reply'] ?? '') ?></textarea>

                    <button type="submit" class="btn btn-success btn-sm">Submit Reply</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
