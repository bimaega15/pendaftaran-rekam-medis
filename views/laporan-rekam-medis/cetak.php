<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Rekam Medis</title>
    <style>
        table.table {
            width: 100%;
            border-collapse: collapse;
        }

        table.table td,
        table.table th {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <table class="table" id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Waktu registrasi</th>
                <th>No. registrasi</th>
                <th>No. rekam medis</th>
                <th>Nama pasien</th>
                <th>Jenis kelamin</th>
                <th>Tanggal lahir</th>
                <th>Jenis registrasi</th>
                <th>Layanan</th>
                <th>Jenis pembayaran</th>
                <th>Status registrasi</th>
                <th>Waktu mulai pelayanan</th>
                <th>Waktu selesai pelayanan</th>
                <th>Petugas pendaftaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $key => $v_data) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($v_data->waktu_registrasi_detail)) ?></td>
                    <td><?= $v_data->no_registrasi_detail ?></td>
                    <td><?= $v_data->no_rekamMedis ?></td>
                    <td><?= $v_data->nama_pasien ?></td>
                    <td><?= $v_data->jenis_kelamin_pasien == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                    <td><?= $v_data->tanggal_lahir_pasien ?></td>
                    <td><?= $v_data->nama_jenisRegistrasi ?></td>
                    <td><?= $v_data->nama_layanan ?></td>
                    <td><?= $v_data->nama_jenisPembayaran ?></td>
                    <td><?= $v_data->nama_statusRegistrasi ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($v_data->waktu_mulai_detail)) ?></td>
                    <td><?= $v_data->waktu_selesai_detail == null ? '-' : date('d/m/y h:i A', strtotime($v_data->waktu_selesai_detail)) ?></td>
                    <td><?= $v_data->nama_users ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>