<div class=" mb-3 m-5 p-3 w-75">
    <h4><?= $title ?></h4>
    <form action="" method="post">
        <div class="mb-3 mt-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" disabled>
                <?= form_error('name') ?>

            </div>
        </div>
        <div class="mb-3 mt-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" placeholder="<?= $user['email'] ?>" disabled>
                <?= form_error('email') ?>

            </div>
        </div>
        <div class="mb-3 mt-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="status" name="status" placeholder="<?= $user['status'] ?>" disabled>
            </div>
        </div>
        <div class="mb-3 mt-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="<?= $user['alamat'] ?>" disabled>
                <?= form_error('name') ?>

            </div>
        </div>
        <div class="mb-3 mt-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="<?= $user['kelas'] ?>" disabled>
                <?= form_error('name') ?>

            </div>
        </div>
        <div class="mb-3 mt-3 row">
            <label for="hobi" class="col-sm-2 col-form-label">Hobi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="hobi" name="hobi" value="<?= $user['hobi'] ?>" disabled>
                <?= form_error('name') ?>

            </div>
        </div>
        <div class="mb-3 mt-3 row">
            <div class="input-group mb-3">
                <label for="role_id" class="col-sm-2 col-form-label">Jabatan</label>
                <select class="form-select" id="role_id" name="role_id">
                    <?php foreach ($role as $r) : ?>
                        <?php if ($r['id'] != 1) : ?>
                            <?php if ($r['id'] === $user['role_id']) : ?>
                                <option value="<?= $r['id'] ?>" selected><?= $r['role'] ?></option>
                            <?php else : ?>
                                <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>

                            <?php endif; ?>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-3 mt-3 row">
            <label for="status" class="col-sm-2 col-form-label">Profile</label>
            <div class="col-sm-10">
                <div class="w-50">
                    <img src="<?= base_url() ?>assets/img/profile/<?= $user['image'] ?>" class="img-fluid rounded-start mb-3" alt="...">
                </div>
            </div>
        </div>
</div>
<div class="col align-self-end me-5 mb-5">
    <button type="submit" class="btn btn-primary align-self-end">Simpan</button>
</div>
</form>