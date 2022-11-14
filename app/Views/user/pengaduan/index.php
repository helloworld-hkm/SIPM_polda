<?= $this->extend('user/templates/index') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900"></h1>

    <?php if (session()->getFlashdata('error-msg')) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error-msg'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

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

        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="/user/tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pengaduan Baru</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tentang</th>
                                        <th>Status</th>
                                        <th>#</th>
                                     </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tentang</th>
                                        <th>Status</th>
                                        <th>#</th>
                                     </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                    <td></td>
                                    <td>a</td>
                                    <td>s
                                    </td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a href="/user/detail" class="dropdown-item">Detail</a>

                                                <a href="/user/ubah" class="dropdown-item">Ubah</a>


                                            </div>
                                        </div>

                                    </td>
                                </tr>
                              
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

        </div>
    </div>

</div>


<?= $this->endSection() ?>