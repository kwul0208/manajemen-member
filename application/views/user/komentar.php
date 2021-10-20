<?php if (form_error('komen')) : ?>
    <div class="alert alert-danger m-2"> kolom Komentar tidak boleh Kosong!! </div>
<?php endif; ?>
<?= $this->session->flashdata('message') ?>
<?php unset($_SESSION['message']) ?>
<div class="card mb-3 m-5 bg-light">
    <!-- join -->
    <?php
    $id_poster = $this->uri->segment(4);

    $identitas = "SELECT `user`. `nama`, `user`.`image` 
        FROM `user`
        JOIN `pengumuman`
        ON `user` . `id` = `pengumuman` . `id_user`
        WHERE `user` . `id` = $id_poster
        ";

    $identitasPost = $this->db->query($identitas)->row_array();

    ?>

    <div class="top-card ">
        <div class="img-card">
            <img src="<?= base_url() ?>assets/img/profile/<?= $identitasPost['image'] ?>" class="img_thumb_pengumuman">
        </div>
        <div class="name-card">
            <h5 class="name_anounc"><?= $identitasPost['nama'] ?></h5>
            <p><?= $pengumuman['date_post'] ?></p>
        </div>
    </div>
    <div class="post-card">
        <p class="post"><?= $pengumuman['post'] ?></p>
        <img src="<?= base_url('assets/img/pengumuman/') ?><?= $pengumuman['image'] ?>" alt="" class="img-thumbnail">

        <hr>
    </div>

    <?php foreach ($komentar as $k) : ?>
        <?php
        $id_poster = $k['id_user'];

        $identitas = "SELECT `user`. `nama`, `user`.`image` 
        FROM `user`
        JOIN `pengumuman`
        ON `user` . `id` = `pengumuman` . `id_user`
        WHERE `user` . `id` = $id_poster
        ";

        $identitasPost = $this->db->query($identitas)->row_array();

        ?>
        <div class="card mb-3 mt-4 ms-3 me-3">
            <div class="top-card">
                <div class="img-card">
                    <img src="<?= base_url() ?>assets/img/profile/<?= $identitasPost['image'] ?>" class="img_thumb_pengumuman">
                </div>
                <div class="name-card">
                    <h5 class="name_anounc"><?= $identitasPost['nama'] ?></h5>
                    <p><?= $k['date_post'] ?></p>
                </div>
            </div>
            <div class="post-card">
                <p class="post"><?= $k['komentar'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>

</div>


<form action="" method="post">
    <div class="card mb-3 m-4 bg-light">
        <div class="d-flex">
            <textarea class="form-control" name="komen" id="exampleFormControlTextarea1" rows="2" placeholder="Komentar..."></textarea>
            <button class="btn btn-primary">komentari</button>
        </div>
    </div>
</form>

<!-- bikin fungsionalitas coment -->