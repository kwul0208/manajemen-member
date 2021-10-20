<?php if (form_error('post')) : ?>
    <div class="alert alert-danger" role="alert"> <?= form_error('post') ?></div>
<?php endif; ?>
<?= $this->session->flashdata('message') ?>
<?php unset($_SESSION['message']) ?>
<div class="card mb-3 m-5 d-flex">
    <?php echo form_open_multipart('User/Pengumuman') ?>
    <div class="row m-3">
        <div class="col-md-6 ">
            <label for="post" class="form-label">Bagikan Pengumuman</label>
            <textarea class="form-control" id="post" name="post" rows="3"></textarea>
            <button class="btn btn-primary mt-2">Bagikan</button>
        </div>
        <div class="col-md-6 mt-2">
            <div class="mb-3">
                <label for="image">Tambah Gambar</label>
                <input type="file" name="image" id="image">
            </div>
        </div>
        </form>
    </div>

    <?php foreach ($pengumuman as $p) : ?>
        <!-- join -->
        <?php
        $id_poster = $p['id_user'];

        $identitas = "SELECT `user`. `nama`, `user`.`image` 
        FROM `user`
        JOIN `pengumuman`
        ON `user` . `id` = `pengumuman` . `id_user`
        WHERE `user` . `id` = $id_poster
        ";

        $identitasPost = $this->db->query($identitas)->row_array();

        ?>

        <div class="card mb-3 m-5">
            <div class="top-card">
                <div class="img-card">
                    <img src="<?= base_url() ?>assets/img/profile/<?= $identitasPost['image'] ?>" class="img_thumb_pengumuman">
                </div>
                <div class="name-card">
                    <h5 class="name_anounc"><?= $identitasPost['nama'] ?></h5>
                    <p><?= $p['date_post'] ?></p>
                </div>
            </div>
            <div class="post-card">
                <p class="post"><?= $p['post'] ?></p>
                <img src="<?= base_url('assets/img/pengumuman/') ?><?= $p['image'] ?>" class="img-thumbnail">
                <div class="buton d-flex justify-content-end mt-2">
                    <!-- query untuk mendapatkan jumbal komentar pada setiap postingan -->
                    <?php
                    $x = $this->db->get_where('komentar', ['id_komentar' => $p['id']])->result_array();
                    ?>
                    <a href="<?= base_url('User/komentar/') ?><?= $p['id'] ?>/<?= $p['id_user'] ?>"><button class="btn btn-secondary btn-sm"> <?= count($x) ?> komentar</button></a>
                </div>
            </div>
        </div>

    <?php endforeach; ?>