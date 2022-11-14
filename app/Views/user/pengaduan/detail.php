<?= $this->extend('user/templates/index') ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">

            <div class="card shadow card-detail">
                <div class="card-header">
                    <a href="/pengaduan">&laquo; Kembali ke daftar pengaduan</a>
                </div>
                <div class="card-header">
                    <h3 class="mb-0 text-gray-900"></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">Nama Pengadu</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            nama
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Status Pengaduan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            status pengaduan
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Tanggal Pengaduan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= date('d M Y'); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Perihal</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            Judul
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Rincian</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <span class="text-justify">Isinya pengaduan</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Foto Bukti</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <a href="/uploads/foto_1" target="_blank"><img src="/uploads/foto1" class="img-fluid img-thumbnail" width="100"></a>
                            <?php if (null) : ?>
                                <a href="/uploads/foto2" target="_blank"><img src="/uploads/foto2" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                            <?php if (null) : ?>
                                <a href="/uploads/foto3" target="_blank"><img src="/uploads/foto3" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>