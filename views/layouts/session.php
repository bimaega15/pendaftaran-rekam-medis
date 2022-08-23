<?php
if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dismissable">
        <span class="close" data-dismiss="alert">&times;</span>
        <strong>Success !</strong> <?= Yii::$app->session->getFlash('success'); ?>
    </div>
<?php
endif;
?>

<?php
if (Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <span class="close" data-dismiss="alert">&times;</span>
        <strong>Fail !</strong> <?= Yii::$app->session->getFlash('error'); ?>
    </div>
<?php
endif;
?>