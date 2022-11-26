<?= $this->extend('user/templates/index') ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Edit Profile</h1>

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

            <div class="card shadow">
                <div class="card-header">
                    <a href="/user/pengaduan">&laquo; Kembali ke Halaman Utama </a>
                </div>
                <div class="card-body">
                    <form action="/user/simpanProfile/<?= $user['email']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <!--  -->
                                    <input type="text" name="email" id="email" class="form-control  " value="<?= $user['email']; ?>" autofocus>

                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control  " value="<?= $user['username']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Foto</label>
                                    <input type="text" name="username" id="username" class="form-control  " value="<?= $user['username']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-block btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>