<div class="card mb-3 m-5">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= base_url() ?>assets/img/profile/default.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $user['nama'] ?></h5>
                <p class="card-text">Email : <?= $user['email'] ?> </p>
                <p class="card-text"><small class="text-muted">Status: <?= $user['status'] ?></small></p>
            </div>
        </div>
    </div>
</div>