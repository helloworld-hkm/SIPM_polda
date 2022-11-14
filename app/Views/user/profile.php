<?= $this->extend('user/templates/index') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-900"></h1>

            <div class="card shadow px-5 py-4">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <img class="card-img-top p-2" src="<?= base_url() ?>/sbassets/img/undraw_profile.svg" alt="Image profile" height="290">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="badge badge-info"> 1</span></li>
                            <li class="list-group-item "><i class="fa fa-user"></i><?= user()->username; ?></li>
                            <li class="list-group-item"><i class="fa fa-envelope"></i> exif_thumbnail</li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> Aktif sejak. <?= date('d M Y'); ?></li>
                            <li class="list-group-item"><i class="fa fa-chart-bar"></i> Jumlah pengaduan :vount </li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <button data-toggle="modal" data-target="#edit-profile" type="button" class="mb-1 btn btn-success btn-block edit-profile" data-id="<"><i class="fas fa-pencil-alt"></i> Ubah Profil</button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <button data-toggle="modal" data-target="#edit-password" type="button" class="d-inline btn btn-primary btn-block edit-password" data-id="<"><i class="fas fa-key"></i> Ubah Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Edit Profile -->
    <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Update Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" id="userid">
                        <div class="form-group">
                            <label for="user_image">Foto Profil</label>
                            <input type="file" name="user_image" id="user_image" class="form-control p-1">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password untuk konfirmasi perubahan" autocomplete="false">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-simpan">Simpan data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Update Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" id="user_id">
                        <div class="form-group">
                            <label for="password">Password Lama</label>
                            <input type="password" name="current-password" id="current-password" class="form-control" placeholder="Masukkan password saat ini" autocomplete="false">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" name="new-password" id="new-password" class="form-control" placeholder="Masukkan password baru" autocomplete="false">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Konfirmasi Password</label>
                            <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Konfirmasi password baru" autocomplete="false">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-simpan">Simpan data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>