<div class="container mt-2">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Manage Member</h2>
        </div>

    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Member
        </div>
        <div class="card-body">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modal_tambah">
                Tambah Member
            </button>

            <small class="form-text text-danger"><?= form_error('nama'); ?></small>


            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>No Whatsapp</th>
                        <th>Tanggal Gabung</th>
                        <th>Jurusan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member) : ?>
                        <tr>
                            <td><?= $member['nama'] ?></td>
                            <td><?= $member['posisi'] ?></td>
                            <td>+62-<?= $member['whatsapp'] ?></td>
                            <td><?= date("d/F/Y", strtotime($member['tanggal_gabung'])) ?></td>
                            <td><?= $member['jurusan'] ?></td>
                            <td>
                                <a href=""><span class="badge bg-danger">Hapus</span></a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#modal_tambah2"><span class="badge bg-warning">edit</span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="modal_tambah" tabindex="-1" aria-labelledby="modal_tambahLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('Admin/manage') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal_tambahLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="tambah" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="modal_tambah2" tabindex="-1" aria-labelledby="modal_tambahLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('Admin/manage') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal_tambahLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="tambah" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>