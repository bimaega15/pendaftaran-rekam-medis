<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Dashboard <small>page</small></h3>
        </div>
        <div class="title_right">
            <div style="text-align: right;">
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" style="display: block;">
        <div class="col-md-4 col-sm-4  ">
            <div class="x_panel">

                <div class="x_title">
                    <h2>Data pasien</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="col-lg-6">
                            <h1>
                                <?= $pasien; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4  ">
            <div class="x_panel">

                <div class="x_title">
                    <h2>Data users</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fa fa-user-secret fa-4x"></i>
                        </div>
                        <div class="col-lg-6">
                            <h1>
                                <?= $users; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4  ">
            <div class="x_panel">

                <div class="x_title">
                    <h2>Data jenis layanan</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fa fa-file-archive-o  fa-4x"></i>
                        </div>
                        <div class="col-lg-6">
                            <h1>
                                <?= $layanan; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="display: block;">
        <div class="col-md-6 col-sm-6">
            <div class="x_panel">

                <div class="x_title">
                    <h2>Jenis registrasi</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fa fa-archive fa-4x"></i>
                        </div>
                        <div class="col-lg-6">
                            <h1>
                                <?= $jenisRegistrasi; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="x_panel">

                <div class="x_title">
                    <h2>Jenis pembayaran</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fa fa-money fa-4x"></i>
                        </div>
                        <div class="col-lg-6">
                            <h1>
                                <?= $jenisPembayaran; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>