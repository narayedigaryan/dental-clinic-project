
<div class="container mt-5 bg-light mb-5 ftco-animate">
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($works as $work): ?>
                <h3 class="text-center mb-4"><?= htmlspecialchars($work['medical-history']); ?></h3>

                <div class="row">
                    <div class="col-md-6 text-center ">
                        <img src="<?= base_url('/images/patients/' . htmlspecialchars($work['image_name'])) ?>"
                             alt="Patient Image" class="img-fluid hover-effect" style="max-height: 300px;">
                    </div>

                    <div class="col-md-6 text-center">
                        <img src="<?= base_url('/images/patients2/' . htmlspecialchars($work['image_name2'])) ?>"
                             alt="Patient Image 2" class="img-fluid hover-effect" style="max-height: 300px;">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

