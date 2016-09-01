<?php

use yii\helpers\Html;
use zc\gii\bs3activeform\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\forsearch\WxRequestLocationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default wx-request-location-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
        'fieldConfig' => [
            'template' => " {label}\n <div class='col-sm-7'>{input}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'tousername') ?>

    <?= $form->field($model, 'fromusername') ?>

    <?= $form->field($model, 'createtime') ?>

    <?= $form->field($model, 'msgtype') ?>

    <?= $form->field($model, 'location_x') ?>

    <?php // echo $form->field($model, 'location_y') ?>

    <?php // echo $form->field($model, 'scale') ?>

    <?php // echo $form->field($model, 'label') ?>

    <?php // echo $form->field($model, 'msgid') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
