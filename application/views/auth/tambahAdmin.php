<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row mb-3">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nama" name="nama" type="text" placeholder="Enter your name" />
                                            <label for="nama">Nama</label>
                                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="text" placeholder="name@example.com" />
                                            <label for="email">Email</label>
                                            <small class="form-text text-danger"><?= form_error('email'); ?></small>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password1" name="password1" type="password" placeholder="Create a password" />
                                                    <label for="password1">Password</label>
                                                    <small class="form-text text-danger"><?= form_error('password1'); ?></small>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm password" />
                                                    <label for="password2">Confirm Password</label>
                                                    <small class="form-text text-danger"><?= form_error('password2'); ?></small>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <button type="submit"><?= $title ?></button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>