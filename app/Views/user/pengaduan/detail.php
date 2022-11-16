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
      
        <ul class="sessions">
      <li class="li-diajukan">
        <div class="time">09:00 AM</div>
        <p>Laporan Diajukan</p>
      </li>
      <li  class="li-diproses">
        <div class="time">09:05 AM</div>
        <p>Laporan Diproses </p>
      </li>
      <li  class="li-selesai">
        <div class="time">09:30 AM</div>
        <p>Laporan Selesai</p>
      </li>
     
    </ul>
            <div class="card shadow card-detail">
                <div class="card-header  ">
                    <a href="/user/pengaduan" class=" btn ml-n3 text-primary font-weight-bold "><i class="fas fa-chevron-left"></i> Kembali ke daftar pengaduan</a>
                    <button class="btn btn-primary float-right ml-2 " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <i class="fa fa-eye rounded-cyrcle"></i> Timeline
        </button>
                    <a href="/user/pengaduan" class="text-light btn btn-success font-weight-bold float-right" ><i class="fa fa-print"></i> print</a>
                </div>
                <!-- <div class="card-header">
                    <h3 ></h3>
                </div> -->
                <div class="card-body">
                    <div class="row my-1">
                        <div class="col-md-3">Nama Pengadu</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            nama
                        </div>
                    </div>
                    <!-- <hr class="invisible"> -->
                    <div class="row  my-1">
                        <div class="col-md-3">Status Pengaduan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            status pengaduan 
                            
                        </div>
                        
                    </div>
                    <!-- <hr> -->
                    <div class="row  my-1">
                        <div class="col-md-3">Tanggal Pengaduan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= date('d M Y'); ?>
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row  my-1">
                        <div class="col-md-3">Perihal</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            Judul
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row  my-2">
                        <div class="col-md-3">Rincian</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <span class="text-justify">Isinya pengaduan</span>
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row  my-2">
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
                    <!-- <hr> -->
                    <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="" id="headingOne">
      <h5 class="mb-0">
       
      </h5>
    </div>

    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <h1> Timeline Pengaduan</h1>
      <ul class="sessions">
      <li class="li-diajukan">
        <div class="time">09:00 AM</div>
        <p>Laporan Diajukan</p>
      </li>
      <li  class="li-diproses">
        <div class="time">09:05 AM</div>
        <p>Laporan Diproses </p>
      </li>
      <li  class="li-selesai">
        <div class="time">09:30 AM</div>
        <p>Laporan Selesai</p>
      </li>
     
    </ul>
      </div>
    </div>
  </div>
 
</div>
                    
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>