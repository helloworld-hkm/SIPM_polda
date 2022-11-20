<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>
<section class="sign-in">
    <div class="container">

        <?php if (session()->getFlashdata('msg-auth')) : ?>
            <div class="alert alert-success m-0" role="alert">
                <?= session()->getFlashdata('msg-auth'); ?>
            </div>
        <?php elseif (session()->getFlashdata('msg-failed')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('msg-failed'); ?>
            </div>
        <?php endif; ?>

        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="<?php echo base_url() ?>/assets/img/auth/sigin_image.jpg" alt="sing in image" width="100%" height="100%"></figure>
            </div>

            <form action="<?= route_to('login') ?>" method="post" class="user">
                <?= csrf_field() ?>


                <?php if ($config->validFields === ['email']) : ?>
                    <div class="form-group">
                        <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="form-group">
                        <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <input type="password" name="password" class="form-control  
                            <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                </div>


                <?php if ($config->allowRemembering) : ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="form-control-input" name="remembering" <?php if (old('remember')) : ?> checked <?php endif ?>>
                            <?= lang('Auth.rememberMe') ?>
                            <label class="form-control-label" for="customCheck">Remember Me</label>
                        </div>
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn btn-primary btn-block">
                    <?= lang('Auth.loginAction') ?></button>
            </form>
            <a href="/auth/register" class="signup-image-link">Belum punya akun? Daftar</a>
            <a href="/app/Views/front/landing.php" class="signup-image-link">Kembali Ke Beranda? Tekan Disini</a>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>