<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>


<div class="container-fluid">

    <?php if (session()->getFlashdata('error-msg')) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible show fade" role="alert">

                    <div class="alert-body">
                        <button class="close" data-dismiss>x</button>
                        <b><i class="fa fa-times"></i></b>
                        <?= session()->getFlashdata('error-msg'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible show fade" role="alert">

                    <div class="alert-body">
                        <button class="close" data-dismiss>x</button>
                        <b><i class="fa fa-check"></i></b>
                        <?= session()->getFlashdata('msg'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-900"></h1>

            <div class="card shadow px-5 py-4">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <img class="card-img-top p-2" src="<?= empty(user()->foto) ? '/sbassets/img/undraw_profile.svg' : '/uploads/profile/' . user()->foto; ?>" alt="Image profile" height="290">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="badge badge-info"> <?= $role; ?></span></li>
                            <li class="list-group-item "><i class="fa fa-user mr-2 "></i><?= user()->username; ?></li>
                            <li class="list-group-item"><i class="fa fa-envelope mr-1"></i> <?= $user->email ?></li>
                            <li class="list-group-item"><i class="fa fa-calendar mr-1"></i> terdaftar sejak. <?php $date = date_create($user->created_at);
                                                                                                                echo (date_format($date, "d F Y H:i:s")) ?></li>
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
                <form action="/admin/simpanProfile/<?= $user->id; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" id="userid">
                        <div class="form-group">
                            <label for="foto">Foto Profil</label>
                            <input type="file" name="foto" id="foto" class="form-control p-1">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div> -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $user->username ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $user->email ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password untuk konfirmasi perubahan" autocomplete="false">
                            <div class="invalid-feedback"></div>
                        </div> -->
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
                <form action="/admin/updatePassword/<?= user()->id ?>" method="post">
                    <div class="modal-body">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" id="user_id">
                        <div class="form-group">
                            <label for="passwordLama">Password Lama</label>
                            <input type="password" name="passwordLama" id="passwordLama" class="form-control <?= $validation->hasError('passwordLama') ? 'is-invalid' : ''; ?>" value="<?= old('passwordLama'); ?>" placeholder="Masukkan password saat ini" autocomplete="false">
                            <div class="invalid-feedback">
                                <?= $validation->getError('passwordLama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passwordBaru">Password Baru</label>
                            <input type="password" name="passwordBaru" id="passwordBaru" class="form-control" placeholder="Masukkan password baru" autocomplete="false">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="konfirm">Konfirmasi Password</label>
                            <input type="password" name="konfirm" id="konfirm" class="form-control" placeholder="Konfirmasi password baru" autocomplete="false">
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
<?= $this->section('additional-js'); ?>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $($this).remove();
        })

    }, 3000);
</script>
<?= $this->endSection(); ?>