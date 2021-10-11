<h2>Tambah Data</h2>
<div class="card m-4">
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-2">
                <label for="nama" class="form-label">Nama: </label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Tulis Nama Lengkap">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>

            </div>
            <div class="mb-2">
                <label for="email" class="form-label">email: </label>
                <input type="text" name="email" id="email" class="form-control" placeholder="email">
                <small class="form-text text-danger"><?= form_error('email'); ?></small>

            </div>
            <div class="mb-2">
                <label for="password1" class="form-label"> password 1</label>
                <input type="password" class="form-control" name="password1" id="password1" placeholder="masukan password 1">
                <small class="form-text text-danger"><?= form_error('password1'); ?></small>

            </div>
            <div class="mb-2">
                <label for="password2" class="form-label">password 2</label>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="name@example.com">
                <small class="form-text text-danger"><?= form_error('password2'); ?></small>

            </div>
            <div class="mb-2 text-end">
                <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
            </div>
        </form>
    </div>
</div>