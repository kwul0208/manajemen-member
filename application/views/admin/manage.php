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
            <a href="<?= base_url('Admin/tambah') ?>"><button type="button" class="btn btn-primary mb-2">
                    Tambah Member
                </button></a>

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
                                <a onclick="confirm('yakin')" href="<?= base_url() ?>Admin/hapus/<?= $member['id'] ?>"><span class="badge bg-danger">Hapus</span></a>
                                <a href="<?= base_url() ?>Admin/edit/<?= $member['id'] ?>"><span class="badge bg-warning">edit</span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>