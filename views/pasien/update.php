<?php

use kartik\date\DatePicker;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Form data pasien';
$this->params['breadcrumbs'][] = ['label' => 'data pasien', 'url' => ['/pasien']];
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
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($pasien, 'nama_pasien')->textInput(['placeholder' => "Masukan nama pasien"]); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($pasien, 'jenis_kelamin_pasien')->radioList(['L' => 'Laki-laki', 'P' => 'Perempuan'], [
                                    'item' => function ($index, $label, $name, $checked, $value) {
                                        $setChecked = $checked ? 'checked' : '';
                                        return '
                                        <label>
                                            <input type="radio" class="flat" name="' . $name . '" value="' . $value . '" ' . $setChecked . '></input> ' . $label . '
                                        </label>
                                        ';
                                    }
                                ]); ?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($pasien, 'tempat_lahir_pasien')->textInput(['placeholder' => "Masukan tempat lahir pasien"]); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php
                                $tanggal_lahir_pasien = strtotime($pasien->tanggal_lahir_pasien);
                                ?>
                                <?= '<label class="form-label">Tanggal lahir</label>';
                                echo DatePicker::widget([
                                    'name' => 'Pasien[tanggal_lahir_pasien]',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    'value' => date('d-M-Y', $tanggal_lahir_pasien),
                                    'options' => ['placeholder' => 'Masukan tanggal lahir ...'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-M-yyyy',
                                    ]
                                ]); ?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?= $form->field($pasien, 'gambar_pasien')->fileInput([
                                    'class' => 'form-control'
                                ]); ?>
                                <?php
                                $gambar_pasien = '/uploads/pasien/default.png';
                                if ($pasien->gambar_pasien != null) {
                                    if (file_exists('uploads/pasien/' . $pasien->gambar_pasien)) {
                                        $gambar_pasien = '/uploads/pasien/' . $pasien->gambar_pasien;
                                    }
                                }
                                ?>
                                <a href="<?= $gambar_pasien ?>" target="_blank">
                                    <img src="<?= $gambar_pasien ?>" width="25%;" alt="gambar pasien" style="border-radius: 5px;">
                                </a>
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