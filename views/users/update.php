<?php

use kartik\date\DatePicker;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Form data users';
$this->params['breadcrumbs'][] = ['label' => 'data users', 'url' => ['/users']];
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
                    <?=
                    $form->field($users, 'page')->textInput([
                        'type' => 'hidden',
                        'value' => 'edit'
                    ])->label(false);
                    ?>
                    <?=
                    $form->field($users, 'password_users_old')->textInput([
                        'type' => 'hidden',
                        'value' => $users->password_users
                    ])->label(false);
                    ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?= $form->field($users, 'username_users')->textInput(['placeholder' => "Masukan username"])->label('Username'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?= $form->field($users, 'password_users')->textInput(['placeholder' => "Masukan password", 'type' => 'password', 'value' => ''])->label('Password'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?= $form->field($users, 'password_users_repeat')->textInput(['placeholder' => "Masukan password", 'type' => 'password'])->label('Password confirm'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($users, 'nama_users')->textInput(['placeholder' => "Masukan nama users"])->label('Nama'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($users, 'jenis_kelamin_users')->radioList(['L' => 'Laki-laki', 'P' => 'Perempuan'], [
                                    'item' => function ($index, $label, $name, $checked, $value) {
                                        $setChecked = $checked ? 'checked' : '';
                                        return '
                                        <label>
                                            <input type="radio" class="flat" name="' . $name . '" value="' . $value . '" ' . $setChecked . '></input> ' . $label . '
                                        </label>
                                        ';
                                    }
                                ])->label('Jenis kelamin'); ?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($users, 'tempat_lahir_users')->textInput(['placeholder' => "Masukan tempat lahir"])->label('Tempat lahir'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= '<label class="form-label">Tanggal lahir</label>';
                                echo DatePicker::widget([
                                    'name' => 'Users[tanggal_lahir_users]',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    'value' => date('d-M-Y', strtotime($users->tanggal_lahir_users)),
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
                                <?= $form->field($users, 'alamat_users')->textarea([
                                    'class' => 'form-control',
                                    'placeholder' => "Masukan alamat"
                                ])->label('Alamat'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?= $form->field($users, 'gambar_users')->fileInput([
                                    'class' => 'form-control'
                                ])->label('Gambar'); ?>
                                <?php
                                $gambar_users = '/uploads/users/default.png';
                                if ($users->gambar_users != null) {
                                    if (file_exists('uploads/users/' . $users->gambar_users)) {
                                        $gambar_users = '/uploads/users/' . $users->gambar_users;
                                    }
                                }
                                ?>
                                <a href="<?= $gambar_users ?>" target="_blank">
                                    <img src="<?= $gambar_users ?>" width="25%;" alt="gambar users" style="border-radius: 5px;">
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