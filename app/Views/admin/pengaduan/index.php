<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
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
                                    <th>Tanggal</th>
                                    <th>Tentang</th>
                                    <th>Status</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Tentang</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php if ($pengaduan) { ?>
                                    <?php foreach ($pengaduan as $num => $data) { ?>


                                        <tr>
                                            <td><?= $num + 1; ?></td>
                                            <td><?php $date = date_create($data['tanggal_pengaduan']); ?>
                                                <?= date_format($date, "d M Y"); ?></td>
                                            <td><?= $data['perihal']; ?></td>
                                            <td><span class=" btn <?= $data['status'] == 'belum diproses' ? 'btn-danger' : 'btn-success' ?> text-white"><?= $data['status']; ?></span></td>
                                            <td>
                                                <!-- <div class="dropdown show">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </a> -->

                                                <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> -->
                                                <a href="/user/detail" class="  btn btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                                <?php if ($data['status'] == 'belum diproses') { ?>

                                                    <a href="/user/detail" class="  btn btn-success"><i class="fa fa-pen"></i> Edit</a>
                                                <?php  } else { ?>
                                                    <button class="  btn btn-secondary"><i class="fa fa-pen"></i> Edit</button>
                                                <?php  } ?>

                                                <!-- </div> -->
                                                <!-- </div> -->

                                            </td>
                                        </tr>
                                    <?php   } ?>
                                    <!-- end of foreach                -->
                                <?php  } else { ?>
                                    <tr>
                                        <td colspan="4">
                                            <h3 class="text-gray-900 text-center">Data belum ada.</h3>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function() {
        $("#semua-pengaduan").DataTable({
            "lengthMenu": [
                [8, 15, 30, 50, -1],
                [8, 15, 30, 50, "All"]
            ],
            "responsive": true,
            "processing": true,
            "serverside": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('/admin/pengaduan/dt_pengaduan') ?>",
                "type": "post"
            },
            "columnDefs": [{
                "render": function(data) {
                    return moment(data).format('DD MMMM YYYY');
                },
                "type": "date",
                "targets": 1,
            }, {
                "orderable": false,
                "targets": 4,
            }],
            "searchDelay": 350,
            "scrollY": 300,
            "scrollCollapse": true,
            "language": {
                "processing": "Loading data..",
                "infoEmpty": "0 entri",
                "info": "Menampilkan _TOTAL_ data pengaduan.",
                "infoFiltered": "(difilter dari _MAX_ total entri)",
                "emptyTable": "Belum ada data",
                "lengthMenu": "Menampilkan _MENU_ entri",
                "search": "Pencarian:",
                "zeroRecords": "Data tidak ditemukan",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
            }
        })
    })
</script>
<?= $this->endSection(); ?>