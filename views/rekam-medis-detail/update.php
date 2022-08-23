<?php

use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;

$this->title = 'Form rekam medis detail';
$this->params['breadcrumbs'][] = ['label' => 'rekam medis', 'url' => ['/rekam-medis']];
$this->params['breadcrumbs'][] = ['label' => 'rekam medis detail', 'url' => ['/rekam-medis-detail?rekamMedis_id=' . $trx_rekammedis_id]];
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
                <div class="x_title">
                    <h2>Tabel <small><?= $title; ?></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php $form = ActiveForm::begin(); ?>
                    <?=
                    $form->field($rekamMedisDetail, 'trx_rekamMedis_id')->textInput([
                        'type' => 'hidden',
                        'value' => $trx_rekammedis_id
                    ])->label(false);
                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($rekamMedisDetail, 'no_registrasi_detail')->textInput(['placeholder' => "Waktu registrasi", 'type' => 'number'])->label('No. registrasi'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=
                                $form->field($rekamMedisDetail, 'waktu_registrasi_detail')->widget(DateTimePicker::classname(), [
                                    'options' => ['placeholder' => 'Masukan waktu regitrasi ...'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-M-yyyy hh:ii'
                                    ]
                                ])->label('Waktu registrasi');
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($rekamMedisDetail, 'master_jenisRegistrasi_id')->widget(Select2::classname(), [
                                    'data' => $jenisRegistrasi,
                                    'options' => ['placeholder' => 'Pilih jenis registrasi ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ])->label('Jenis registrasi'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($rekamMedisDetail, 'master_layanan_id')->widget(Select2::classname(), [
                                    'data' => $layanan,
                                    'options' => ['placeholder' => 'Pilih jenis layanan ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ])->label('Jenis layanan'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($rekamMedisDetail, 'master_jenisPembayaran_id')->widget(Select2::classname(), [
                                    'data' => $jenisPembayaran,
                                    'options' => ['placeholder' => 'Pilih jenis pembayaran ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ])->label('Jenis pembayaran'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($rekamMedisDetail, 'master_statusRegistrasi_id')->widget(Select2::classname(), [
                                    'data' => $statusRegistrasi,
                                    'options' => ['placeholder' => 'Pilih jenis status registrasi ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ])->label('Jenis status registrasi'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?= $form->field($rekamMedisDetail, 'master_users_id')->widget(Select2::classname(), [
                                    'data' => $users,
                                    'options' => ['placeholder' => 'Pilih petugas ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ])->label('Petugas'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>

                                <?= Html::resetButton('Cancel', ['class' => 'btn btn-warning']) ?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>