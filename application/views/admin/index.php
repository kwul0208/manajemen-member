<main>
    <div class="container-fluid px-4">
        <h2>Dashboard</h2>
        <?= $this->session->flashdata('message'); ?>
        <?php unset($_SESSION['message']); ?>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Member
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tingkatan</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Option</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($members as $member) : ?>
                            <tr>
                                <td><?= $member['nama'] ?></td>
                                <td><?= $member['email'] ?></td>
                                <?php if ($member['role_id'] == 1) : ?>
                                    <td>Guru</td>
                                <?php else : ?>
                                    <td>Siswa</td>
                                <?php endif; ?>
                                <td class="d-flex">
                                    <p class=" me-auto bd-highlight"><?= $member['jabatan'] ?></p>
                                    <a href="<?= base_url() ?>Admin/editUser/<?= $member['id'] ?>"><span class="badge bg-primary">Ubah</span></a>
                                </td>
                                <td>

                                    <a href="<?= base_url() ?>Admin/ubahStatusMember/<?= $member['id'] ?>"><?= $member['status'] ?></a>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>User/detail/<?= $member['id'] ?>"><span class="badge bg-primary">Detail</span></a>
                                    <a href="<?= base_url() ?>Admin/hapusUser/<?= $member['id'] ?>" onclick="confirm('yakin?')"> <span class="badge bg-danger">hapus</span></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>