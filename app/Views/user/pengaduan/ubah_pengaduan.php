<?= $this->extend('user/templates/index') ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Edit Pengaduan Masyarakat</h1>

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
                    <a href="/user/pengaduan">&laquo; Kembali ke daftar pengaduan</a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/user/ubahPengaduan/'.$data['id'])?> " method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="judul">Perihal</label>
                                    <input type="text" name="judul_pengaduan" id="judul" class="form-control  <?= $validation->hasError('judul_pengaduan') ? 'is-invalid' : ''; ?>" value="<?= old('judul_pengaduan') ? old('judul_pengaduan') : $data['perihal']; ?>" autofocus>
                                    <div class="invalid-feedback">
                                    <?= $validation->getError('judul_pengaduan'); ?>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="isi">Jelaskan lebih rinci</label>
                                    <textarea name="isi_pengaduan" id="isi" cols="30" rows="13" class="form-control <?= $validation->hasError('isi_pengaduan') ? 'is-invalid' : ''; ?>"><?= old('isi_pengaduan') ? old('isi_pengaduan') : $data['detail']; ?></textarea>
                                    <div class="invalid-feedback">
                                      
                                    <?= $validation->getError('isi_pengaduan'); ?>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Nama Pengadu</label>
                                    <div class="form-check">
                                        <input class="form-check-input anonym" type="radio" name="nama_pengadu" id="nama_pengadu1" value="anonym" <?= $data['nama_pengadu'] == 'anonym' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="nama_pengadu1">
                                            <span class="text-gray-800">Samarkan (anonym)</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nama_pengadu" id="nama_pengadu2" value="2">
                                        <label class="form-check-label" for="nama_pengadu2">
                                            <span class="text-gray-800">Gunakan nama sendiri</span>
                                        </label>
                                    </div>
                                    <input type="text" class="form-control pengadu" name="pengadu" value="<?= user()->username; ?>"  <?= $data['nama_pengadu'] == user()->username ? 'checked' : ''; ?> readonly  >
                                </div>
                                <div class="form-group">
                                    <label>Upload foto bukti</label>
                                    <div class="mb-3">
                                        <p class="mb-0 text-info">Aturan: wajib upload 1 gambar, maksimal 3 gambar, setiap gambar maksimal ukuran sebesar 1 MB.</p>
                                    </div>
                                    <hr>
                                    <input type="hidden" name="bukti_id" value="<?= $bukti['id']; ?>">
                                    <input type="file" name="images[]" id="images" class="p-1 form-control  <?= $validation->hasError('images') ? 'is-invalid' : ''; ?>" multiple>
                                    <div class="invalid-feedback">
                                    <?= $validation->getError('images'); ?>
                                </div>
                                    <?= session()->getFlashdata('err-files'); ?>
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

<?= $this->section('additional-js'); ?>
<script>
       window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $($this).remove();
      })

    }, 3000);
    $('.pengadu').hide();
    $('input[type=radio]').click(function() {
        if ($(this).hasClass('anonym')) {
            $('.pengadu').hide()
        } else {
            $('.pengadu').show()
        }
    })

 
</script>
<?= $this->endSection(); ?>