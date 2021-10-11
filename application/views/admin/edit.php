<h2 class="text-center">Edit</h2>
<div class="card m-5">
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-2">
                <label for="nama" class="form-label">Nama: </label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama'] ?>">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>

            </div>
            <div class="mb-2 text-end">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>