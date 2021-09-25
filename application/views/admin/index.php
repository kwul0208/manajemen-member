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
                            <th>Posisi</th>
                            <th>No Whatsapp</th>
                            <th>Tanggal Gabung</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($members as $member) : ?>
                            <tr>
                                <td><?= $member['nama'] ?></td>
                                <td><?= $member['posisi'] ?></td>
                                <td><?= $member['whatsapp'] ?></td>
                                <td><?= date("d/F/Y", strtotime($member['tanggal_gabung'])) ?></td>
                                <td><?= $member['jurusan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>