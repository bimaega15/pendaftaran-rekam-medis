<?php

use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;

$this->title = 'Form rekam medis';
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
                <div class="x_title">
                    <h2>Tabel <small><?= $title; ?></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group">
                                <?= $form->field($rekamMedis, 'no_rekamMedis')->textInput(['placeholder' => "Masukan no. rekam medis", 'type' => 'text']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($rekamMedis, 'pasien_id')->widget(Select2::classname(), [
                                    'data' => $pasien,
                                    'options' => ['placeholder' => 'Pilih pasien ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ])->label('Nama pasien'); ?>
                            </div>
                            <div class="form-group">
                                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>

                                <?= Html::resetButton('Cancel', ['class' => 'btn btn-warning']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>