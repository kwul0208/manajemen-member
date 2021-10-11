<div class="input_post_area mb-3 m-2 ms-5">
    <?php if (form_error('post')) : ?>
        <div class="alert alert-danger" role="alert"> <?= form_error('post') ?></div>
    <?php endif; ?>
    <?= $this->session->flashdata('message') ?>
    <?php unset($_SESSION['message']) ?>
    <form action="" method="POST">
        <label for="post" class="form-label">Bagikan Pengumuman</label>
        <textarea class="form-control" id="post" name="post" rows="3"></textarea>
        <button class="btn btn-primary mt-2">Bagikan</button>
    </form>
</div>

<?php foreach ($pengumuman as $p) : ?>
    <div class="card mb-3 m-5">
        <div class="top-card">
            <div class="img-card">
                <img src="<?= base_url() ?>assets/img/profile/<?= $p['image'] ?>" class="img_thumb_pengumuman">
            </div>
            <div class="name-card">
                <h5 class="name_anounc"><?= $p['nama'] ?></h5>
                <p><?= $p['date_post'] ?></p>
            </div>
        </div>
        <div class="post-card">
            <p class="post"><?= $p['post'] ?></p>
        </div>
    </div>

<?php endforeach; ?>