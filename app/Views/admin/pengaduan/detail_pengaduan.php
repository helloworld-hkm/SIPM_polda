<?= $this->extend('admin/templates/index') ?>

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
                    <h3 class="mb-0 text-gray-900"><?= $title; ?></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <?php if (null) : ?>
                                <button type="button" class="btn btn-sm btn-primary disabled"><i class="fas fa-info-circle"></i> Pengaduan selesai </button>
                            <?php else : ?>
                                <button type="button" data-toggle="modal" data-target="#approval" class="btn btn-sm btn-primary"><i class="fas fa-info-circle"></i>status pengaduan</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr>
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
                            tgl
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Perihal</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            judul
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Rincian</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            isi
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

    <div class="modal fade" id="approval" tabindex="-1" role="dialog" aria-labelledby="approvalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="approvalLabel">Yakin ingin mengubah status pengaduan?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span class="text-gray-900">Klik tombol "Yakin" untuk mengubah status pengaduan.</span>

                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="status_pengaduan" value="">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-yakin">Yakin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function() {
        $("#formApprovePengaduan").submit(function(e) {
            e.preventDefault()

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                dataType: "json",
                data: $(this).serialize(),
                beforeSend: function(res) {
                    $('.btn-yakin').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                success: function(res) {
                    $.toast({
                        heading: res.msg,
                        position: 'top-right',
                        icon: 'success'
                    })

                    $("#approval").modal("toggle")

                    setTimeout(function() {
                        location.reload()
                    }, 3000)
                }
            })
        })
    })
</script>
<?= $this->endSection(); ?>