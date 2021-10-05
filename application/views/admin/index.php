<main>
    <div class="container-fluid px-4">
        <h2>Dashboard</h2>
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
                                    <td>Admin</td>
                                <?php else : ?>
                                    <td>Member</td>
                                <?php endif; ?>
                                <td>

                                    <a href="<?= base_url() ?>Admin/ubahStatusMember/<?= $member['id'] ?>"><?= $member['status'] ?></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>