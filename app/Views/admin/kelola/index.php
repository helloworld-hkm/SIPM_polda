<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content'); ?>
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
                    <h3>Daftar Pengguna</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <!-- <th>opsi</th> -->
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <!-- <th>Opsi</th> -->
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php if ($pengguna) { ?>
                                    <?php foreach ($pengguna as $num => $data) { ?>


                                        <tr>
                                            <td><?= $num + 1; ?></td>
                                            <td><?= $data['email']; ?></td>
                                            <td><?= $data['username']; ?></td>
                                            <!-- <td>
                                                <a href="/admin/detail" class="  btn btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                           

                                           

                                            </td> -->
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

        tbl_users()

        function tbl_users() {
            $("#tbl-users").DataTable({
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "processing": true,
                "serverside": true,
                "order": [],
                "ajax": {
                    "url": '<?= base_url('/admin/ManageUser/dt_users') ?>',
                    "type": "post"
                },
                "columnDefs": [{
                    "targets": [1, 4],
                    "orderable": false
                }],
                "searchDelay": 350,
                "scrollY": 300,
                "scrollCollapse": true,
                "language": {
                    "processing": "Loading data..",
                    "infoEmpty": "0 entri",
                    "info": "<span class='text-gray-900'>Menampilkan _TOTAL_ data user.</span>",
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
        }

        // Hapus User (Single Data)
        $(document).on('click', '.hapus-user', function() {
            $(".modal-body #user_id").val($(this).data('userid'))
        })

        $('#formHapusUser').submit(function(e) {
            e.preventDefault()

            var userid = $("#user_id").val()

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                dataType: 'json',
                data: {
                    id: userid
                },
                beforeSend: function() {
                    $('.btn-yakin').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                success: function(res) {
                    $.toast({
                        text: res.msg,
                        position: "top-right",
                        hideAfter: 2500,
                    })
                    $("#modal-hapus").modal('toggle')
                    setTimeout(function() {
                        location.reload()
                    }, 3000)
                }
            })
        })

        // Pesan berhasil di verifikasi (approved)
        var msg = $("#flash-msg").data('flash')
        if (msg) {
            $.toast({
                text: msg,
                position: "top-right",
                hideAfter: 3000,
            })
        }

    })
</script>
<?= $this->endSection(); ?>