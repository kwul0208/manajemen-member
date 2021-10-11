<div class="container mt-2">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Manage Admin</h2>
        </div>

    </div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>


        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                Data berhasil <stron><?= $this->session->flashdata('flash'); ?></stron>
            </div>
        </div>
    <?php endif; ?>
    <?php $this->session->unset_userdata('flash'); ?>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Member
        </div>
        <div class="card-body">

            <!-- Button trigger modal -->
            <a href="<?= base_url('Admin/tambahAdmin') ?>"><button type="button" class="btn btn-primary mb-2">
                    Tambah Admin
                </button></a>

            <small class="form-text text-danger"><?= form_error('nama'); ?></small>


            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member) : ?>
                        <tr>
                            <td><?= $member['nama'] ?></td>
                            <td><?= $member['email'] ?></td>
                            <td>
                                <a href="<?= base_url() ?>Admin/ubahStatusAdmin/<?= $member['id'] ?>"><?= $member['status'] ?></a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>Admin/hapusUser/<?= $member['id'] ?>" onclick="confirm('yakin?')"> <span class="badge bg-danger">hapus</span></a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>