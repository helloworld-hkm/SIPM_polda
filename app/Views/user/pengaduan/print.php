<html>

<body>
    <center>
        <h2 style="margin-top:50px;">
            Data Pelaporan Masyarakat
        </h2>
        <p style="margin-top:-10px;">
            Polda Jawa TEngah
        </p>
    </center>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengadu </th>
                <th scope="col">Perihal</th>
                <th scope="col">Detail</th>
                <th scope="col">Tanggal Pengaduan</th>
                <th scope="col">Tanggal Di proses</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pengaduan as $dt) : ?>
                <tr>
                    <td scope="row" style="text-align: left;"><?= $i++; ?></td>

                    <td style="text-align: left;"><?= $dt->nama_pengadu ?></td>
                    <td style="text-align: left;"><?= $dt->perihal ?></td>
                    <td style="text-align: left;"><?= $dt->detail ?></td>
                    <td style="text-align: left;"><?= $dt->tanggal_pengaduan ?></td>
                    <td style="text-align: left;"><?= $dt->tanggal_diproses ?></td>
                    <td style="text-align: left;"><?= $dt->status ?></td>


                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>