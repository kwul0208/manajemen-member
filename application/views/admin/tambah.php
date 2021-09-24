<h2>Tambah Data</h2>
<div class="card m-4">
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-2">
                <label for="nama" class="form-label">Nama: </label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Tulis Nama Lengkap">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>

            </div>
            <fieldset disabled>
                <div class="mb-2">
                    <label for="posisi" class="form-label">Posisi: </label>
                    <input type="text" name="posisi" id="posisi" class="form-control" value="Member">
                    <small class="form-text text-danger"><?= form_error('posisi'); ?></small>

                </div>
            </fieldset>
            <div class="mb-2">
                <label for="whatsapp" class="form-label">No Whatsapp</label>
                <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="0828xxx...">
                <small class="form-text text-danger"><?= form_error('whatsapp'); ?></small>

            </div>
            <div class="mb-2">
                <label for="tanggal_gabung" class="form-label">Tanggal_gabung</label>
                <input type="date" class="form-control" name="tanggal_gabung" id="tanggal_gabung" placeholder="name@example.com">
                <small class="form-text text-danger"><?= form_error('tanggal_gabung'); ?></small>

            </div>
            <div class="mb-2">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="ex: Teknik Informatika">
                <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>

            </div>
            <div class="mb-2 text-end">
                <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
            </div>
        </form>
    </div>
</div>