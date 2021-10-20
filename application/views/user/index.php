<?= $this->session->flashdata('message') ?>
<div class="card mb-3 m-5">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= base_url() ?>assets/img/profile/<?= $user['image'] ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">

                <?php if ($user['role_id'] === '1') : ?>
                    <h3 class="card-title"><?= $user['nama'] ?> </h3><span class="badge rounded-pill bg-warning text-dark mb-3">Admin</span>
                <?php elseif ($user['role_id'] === '2') : ?>
                    <h3 class="card-title"><?= $user['nama'] ?> </h3><span class="badge rounded-pill bg-warning text-dark mb-3">Anggota</span>
                <?php elseif ($user['role_id'] === '3') : ?>
                    <h3 class="card-title"><?= $user['nama'] ?> </h3><span class="badge rounded-pill bg-warning text-dark mb-3">Ketua</span>
                <?php elseif ($user['role_id'] === '4') : ?>
                    <h3 class="card-title"><?= $user['nama'] ?> </h3><span class="badge rounded-pill bg-warning text-dark mb-3">Wakil Ketua</span>
                <?php elseif ($user['role_id'] === '5') : ?>
                    <h3 class="card-title"><?= $user['nama'] ?> </h3><span class="badge rounded-pill bg-warning text-dark mb-3">Sekertaris</span>
                <?php elseif ($user['role_id'] === '6') : ?>
                    <h3 class="card-title"><?= $user['nama'] ?> </h3><span class="badge rounded-pill bg-warning text-dark mb-3">Bendahara</span>
                <?php endif; ?> <p class="card-text">Email : <?= $user['email'] ?> </p>
                <p class="card-text">Alamat : <?= $user['alamat'] ?> </p>
                <p class="card-text">Kelas : <?= $user['kelas'] ?> </p>
                <p class="card-text">Hobi : <?= $user['hobi'] ?> </p>
                <p class="card-text"><small class="text-muted">Status: <?= $user['status'] ?></small></p>
            </div>
            <a href="<?= base_url() ?>User/editProfile"><button class="btn btn-primary ms-3">Edit Profile</button></a>
        </div>
    </div>
</div>