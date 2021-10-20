<div class=" mb-3 m-5 p-3 w-75">
    <h4><?= $title ?></h4>
    <?php echo form_open_multipart('User/editProfile') ?>
    <div class="mb-3 mt-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
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
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
            <?= form_error('name') ?>

        </div>
    </div>
    <div class="mb-3 mt-3 row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $user['kelas'] ?>">
            <?= form_error('name') ?>

        </div>
    </div>
    <div class="mb-3 mt-3 row">
        <label for="hobi" class="col-sm-2 col-form-label">Hobi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="hobi" name="hobi" value="<?= $user['hobi'] ?>">
            <?= form_error('name') ?>

        </div>
    </div>
    <div class="mb-3 mt-3 row">
        <label for="status" class="col-sm-2 col-form-label">Profile</label>
        <div class="col-sm-10">
            <div class="w-50">
                <img src="<?= base_url() ?>assets/img/profile/<?= $user['image'] ?>" class="img-fluid rounded-start mb-3" alt="...">
            </div>
            <div class="input-group mb-3">
                <input type="file" name="image" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
        </div>
    </div>
</div>
<div class="col align-self-end me-5 mb-5">
    <button class="btn btn-primary align-self-end">Simpan</button>
</div>
</form>