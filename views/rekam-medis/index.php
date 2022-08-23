<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = 'Data rekam medis';
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
                        <a class="btn btn-primary btn-sm" href="<?php echo Url::to(['rekam-medis/create']); ?>"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th width="20%;">No. rekam medis</th>
                                    <th>Nama pasien</th>
                                    <th>J.K</th>
                                    <th>Tempat/ Tanggal lahir</th>
                                    <th width="15%;">Gambar</th>
                                    <th width="20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $v_data) :
                                    $gambar_pasien = '/uploads/pasien/default.png';
                                    if ($v_data->gambar_pasien != null) {
                                        if (file_exists('uploads/pasien/' . $v_data->gambar_pasien)) {
                                            $gambar_pasien = '/uploads/pasien/' . $v_data->gambar_pasien;
                                        }
                                    }
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $v_data->no_rekamMedis ?></td>
                                        <td><?= $v_data->nama_pasien  ?></td>
                                        <td><?= $v_data->jenis_kelamin_pasien  ?></td>
                                        <td><?= $v_data->tempat_lahir_pasien  ?> / <?= date('d-M-Y', strtotime($v_data->tanggal_lahir_pasien)) ?></td>
                                        <td>
                                            <a href="<?= $gambar_pasien ?>" target="_blank">
                                                <img src="<?= $gambar_pasien ?>" alt="" width="100%;" style="border-radius: 5px;">
                                            </a>
                                        </td>

                                        <td>
                                            <div class="text-center">
                                                <a class="btn btn-primary btn-sm" href="<?php echo Url::to(['/rekam-medis-detail?rekamMedis_id=' . $v_data->id]); ?>"><i class="fa fa-file-text"></i> Rekam Medis</a>
                                                <a class="btn btn-warning btn-sm" href="<?php echo Url::to(['rekam-medis/update', 'id' => $v_data->id]); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                                <a onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="<?php echo Url::to(['rekam-medis/delete', 'id' => $v_data->id]); ?>"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>