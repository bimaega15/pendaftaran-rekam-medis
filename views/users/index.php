<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = 'Data users';
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
                        <a class="btn btn-primary btn-sm" href="<?php echo Url::to(['users/create']); ?>"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>J.K</th>
                                <th>Tempat / Tgl lahir</th>
                                <th>Alamat</th>
                                <th width="15%;">Gambar</th>
                                <th width="20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $v_data) :
                                $gambar_users = '/uploads/users/default.png';
                                if ($v_data->gambar_users != null) {
                                    if (file_exists('uploads/users/' . $v_data->gambar_users)) {
                                        $gambar_users = '/uploads/users/' . $v_data->gambar_users;
                                    }
                                }
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $v_data->username_users ?></td>
                                    <td><?= $v_data->nama_users ?></td>
                                    <td><?= $v_data->jenis_kelamin_users ?></td>
                                    <td><?= $v_data->tempat_lahir_users ?>, <?= date('d-M-Y', strtotime($v_data->tanggal_lahir_users)) ?></td>
                                    <td><?= $v_data->alamat_users; ?></td>
                                    <td>
                                        <a href="<?= $gambar_users ?>" target="_blank">
                                            <img src="<?= $gambar_users ?>" alt="" width="100%;" style="border-radius: 5px;">
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="<?php echo Url::to(['users/update', 'id' => $v_data->id]); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                        <a onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="<?php echo Url::to(['users/delete', 'id' => $v_data->id]); ?>"><i class="fa fa-trash"></i> Delete</a>
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