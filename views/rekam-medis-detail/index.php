<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = 'Data rekam medis detail';
$this->params['breadcrumbs'][] = ['label' => 'rekam medis', 'url' => ['/rekam-medis']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tables <small><?= $title ?></small></h3>
        </div>
        <div class="title_right">
            <div style="text-align: right;">
                <?= Breadcrumbs::widget([
                    'homeLink' => [
                        'label' => 'Dashboard',
                        'url' => '/',
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]); ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <?php
                $this->beginContent('@app/views/layouts/session.php');
                $this->endContent();
                ?>
                <div class="x_title">
                    <h2>Tabel <small><?= $title; ?></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div style="margin-bottom: 10px;">
                        <a class="btn btn-primary btn-sm" href="<?php echo Url::to(['rekam-medis-detail/create?rekamMedis_id=' . $trx_rekammedis_id]); ?>"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
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
                                    <th>Action</th>
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
                                        <td>
                                            <div class="text-center">
                                                <a class="btn btn-warning btn-sm" href="<?php echo Url::to(['rekam-medis-detail/update?id=' . $v_data->id . '&rekamMedis_id=' . $v_data->id_trx_rekammedis]); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                                <a onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="<?php echo Url::to(['rekam-medis-detail/delete', 'id' => $v_data->id]); ?>"><i class="fa fa-trash"></i> Delete</a>
                                                <a onclick="return confirm('Apakah pasien ini sudah tutup kunjungan?')" class="btn btn-primary btn-sm" href="<?php echo Url::to(['rekam-medis-detail/tutup-kunjungan?id=' . $v_data->id . '&rekamMedis_id=' . $v_data->id_trx_rekammedis]); ?>"><i class="fa fa-file-text"></i> Tutup kunjungan</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>