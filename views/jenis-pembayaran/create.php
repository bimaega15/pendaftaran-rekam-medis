<?php

use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Form jenis pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'jenis pembayaran', 'url' => ['/jenis-pembayaran']];
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
                        <div class="col-lg-6">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group">
                                <?= $form->field($jenisPembayaran, 'nama_jenisPembayaran')->textInput(['placeholder' => "Masukan nama pembayaran"]); ?>
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