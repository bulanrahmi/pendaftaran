<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Cetak</title>
    <link rel="stylesheet" href=" <?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body>

    <table class="table table-striped table-bordered">
        <tr class="text-center">
            <th>Nama Pasien</th>
            <th>No BPJS </th>
            <th>Alamat</th>
            <th>Jenis Pasien</th>
            <th>Tanggal Berkunjung</th>
            <th>Keterangan</th>
        </tr>

        <?php
        $no = 1;
        foreach ($mahasiswa as $mhs) : ?>

            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= $mhs->nama; ?></td>
                <td><?= $mhs->alamat; ?></td>
                <td><?= $mhs->tanggal_lahir; ?></td>
                <td><?= $mhs->email; ?></td>
                <td><?= $mhs->no_telp; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>