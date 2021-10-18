<?= $this->session->flashdata('message') ?>
<div class="card mb-3 m-5">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= base_url() ?>assets/img/profile/<?= $user['image'] ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h3 class="card-title"><?= $user['nama'] ?> </h3><span class="badge rounded-pill bg-warning text-dark mb-3"><?= $user['jabatan'] ?></span>
                <p class="card-text">Email : <?= $user['email'] ?> </p>
                <p class="card-text">Alamat : <?= $user['alamat'] ?> </p>
                <p class="card-text">Kelas : <?= $user['kelas'] ?> </p>
                <p class="card-text">Hobi : <?= $user['hobi'] ?> </p>
                <p class="card-text"><small class="text-muted">Status: <?= $user['status'] ?></small></p>
            </div>
        </div>
    </div>
</div>