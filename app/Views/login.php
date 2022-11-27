<?= $this->extend('front/templates/index') ?>

<?= $this->section('content') ?>

<div class="row  justify-content-center  mt-5">

    <div class="col-xl-6 col-lg-6 col-md-9 col-sm-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-4 d-none d-lg-block text-center mt-5 ml-5   ">
                        <figure><img src="<?php echo base_url() ?>/assets/img/polda.ico" class="" alt="" width="80%" height="80%"></figure>
                    </div>
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h6 font-weight-bold text-primary mb-4">Sistem Informasi Pengaduan Masyarakat</h1>
                                <h1 class="h4 text-gray-900 mb-4 mt-n3">POLDA Jawa Tengah</h1>
                            </div>

                            <?php if (session()->getFlashdata('msg-auth')) : ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('msg-auth'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('msg-failed')) : ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= session()->getFlashdata('msg-failed'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?= view('Myth\Auth\Views\_message_block') ?>
                            <form action="<?= route_to('login') ?>" method="post" class="user">
                                <?= csrf_field(); ?>
                                <div class="form-group ">
                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                    <div class="invalid-feedback pl-1">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                                <button type="submit" name="btn-submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg text-center mb-3 mt-n4">
                        <hr>
                        <?php if ($config->activeResetter) : ?>

                            <div class="text-center">
                                <a class="small" href="<?= route_to('forgot') ?>">
                                    <?= lang('Auth.forgotYourPassword') ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ($config->allowRegistration) : ?>
                            <div class="text-center">
                                <a class="small" href="<?= route_to('register') ?>">
                                    <?= lang('Auth.needAnAccount') ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>