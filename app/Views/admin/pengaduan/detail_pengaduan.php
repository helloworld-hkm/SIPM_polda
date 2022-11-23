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
      
        <!-- <ul class="sessions">
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
     
    </ul> -->
            <div class="card shadow card-detail">
                <div class="card-header  ">
                    <a href="/admin/pengaduan" class=" btn ml-n3 text-primary font-weight-bold "><i class="fas fa-chevron-left"></i> Kembali ke daftar pengaduan</a>
                    <button class="btn btn-primary float-right ml-2 " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <i class="fa fa-eye rounded-cyrcle"></i> Timeline
        </button>
                <?php  if ($detail->status=='belum diproses') {?>
                    
             
                    <a href="/admin/prosesPengaduan/<?=$detail->id?>" class="text-light btn btn-warning font-weight-bold  float-right" ><i class="fa fa-clipboard"></i> Proses Laporan</a>
                    <?php  } elseif ($detail->status=='diproses') {?>
                        <div class="btn-group float-right  dropleft">
  <button type="button" class="btn btn-success dropdown-toggle  " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Selesaikan Pengaduan
  </button>
  <div class="dropdown-menu">
  <a class="dropdown-item" href="#">Terima</a>
    <a class="dropdown-item" href="#">Tolak</a>
  </div>
</div>
                   <?php }    ;?>
                </div>
                <!-- <div class="card-header">
                    <h3 ></h3>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">Nama Pengadu</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?=$detail->nama_pengadu?>
                        </div>
                    </div>
                    <hr >
                    <div class="row  ">
                        <div class="col-md-3">Status Pengaduan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                        <?=$detail->status?>
                            
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-3">Tanggal Pengaduan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                        <?=$detail->tanggal_pengaduan?>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-3">Perihal</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                        <?=$detail->perihal?>
                        </div>
                    </div>
                    <hr>
                    <div class="row  ">
                        <div class="col-md-3">Rincian</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <span class="text-justify"> <?=$detail->detail?></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row  ">
                        <div class="col-md-3">Foto Bukti</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <a href="/uploads/<?=$bukti['img_satu']?>" target="_blank"><img src="/uploads/<?=$bukti['img_satu']?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php if ($bukti['img_dua']!='null') : ?>
                                <a href="/uploads/<?=$bukti['img_dua']?>" target="_blank"><img src="/uploads/<?=$bukti['img_dua']?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                            <?php if ($bukti['img_tiga']!='null') : ?>
                                <a href="/uploads/<?=$bukti['img_tiga']?>" target="_blank"><img src="/uploads/<?=$bukti['img_tiga']?>" class="img-fluid img-thumbnail" width="100"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="accordion" id="accordionExample">
  <div class="">
    <div class="" id="headingOne">
      <h5 class="mb-0">
       
      </h5>
    </div>

    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <h1> Timeline Pengaduan</h1>
      <ul class="sessions">
      <li class="li-diajukan">
        <div class="time">  <?=$detail->tanggal_pengaduan?></div>
        <p>Laporan Diajukan</p>
      </li>
    <?php if ($detail->tanggal_diproses!='0000-00-00 00:00:00') {?>
        <li  class="li-diproses">
        <div class="time">  <?=$detail->tanggal_diproses?></div>
        <p>Laporan Diproses </p>
      </li>
    <?php }?>
    <?php if ($detail->tanggal_selesai!='0000-00-00 00:00:00') {?>
      <li  class="li-selesai">
        <div class="time">09:30 AM</div>
        <p>Laporan Selesai</p>
      </li>
      <?php }?>
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