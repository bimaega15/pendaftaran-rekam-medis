<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = 'Laporan rekam medis';
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
                    <a class="btn btn-primary btn-sm" href="/laporan-rekam-medis/cetak-laporan" target="_blank">
                        <i class="fa fa-print" aria-hidden="true"></i> Cetak Laporan
                    </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>