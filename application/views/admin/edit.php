<h2 class="text-center">Edit Member</h2>
<div class="card m-5">
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-2">
                <label for="nama" class="form-label">Nama: </label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $member['nama'] ?>">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>

            </div>
            <fieldset disabled>
                <div class="mb-2">
                    <label for="posisi" class="form-label">Posisi: </label>
                    <input type="text" name="posisi" id="posisi" class="form-control" value="<?= $member['posisi'] ?>">
                    <small class="form-text text-danger"><?= form_error('posisi'); ?></small>

                </div>
            </fieldset>
            <div class="mb-2">
                <label for="whatsapp" class="form-label">No Whatsapp</label>
                <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="<?= $member['whatsapp'] ?>">
                <small class="form-text text-danger"><?= form_error('whatsapp'); ?></small>

            </div>
            <div class="mb-2">
                <label for="tanggal_gabung" class="form-label">Tanggal_gabung</label>
                <input type="date" class="form-control" name="tanggal_gabung" id="tanggal_gabung" value="<?= $member['tanggal_gabung'] ?>">
                <small class="form-text text-danger"><?= form_error('tanggal_gabung'); ?></small>

            </div>
            <div class="mb-2">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $member['jurusan'] ?>">
                <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>

            </div>
            <div class="mb-2 text-end">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>