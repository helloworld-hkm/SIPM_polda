<?= $this->extend('user/templates/index') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <table align="center">
        <tr>
            <td width="100">
                <center>
                    <!-- Lokasi logo kampus pada aplikasi app-pmb -->
                    <img src="<?php echo base_url() ?>/assets/img/polda.ico" alt="" width="100">
                </center>
            </td>
            <td width="400">
                <center>
                    <font size="3">CETAK DATA PENGADUAN</font><br>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
    </table>
    <br>
    <center>
        <font size="4"><b>Detail Pengaduan</b></font><br>
    </center>
    <br>
    <table align="center">
        <tr>
            <td width="120">Id</td>
            <td width="180">: <b><?= $detail['id']; ?></b></td>
            <td rowspan="9" width="200">
                <center>

                </center>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?= $detail['id']; ?></td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            <td width="500">
                <hr>
            </td>
        </tr>
    </table>
</div>


<?= $this->endSection() ?>