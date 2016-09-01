<?php

use yii\helpers\Html;
use zc\gii\bs3activeform\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\forsearch\WxWechatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default wx-wechat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
        'fieldConfig' => [
            'template' => " {label}\n <div class='col-sm-7'>{input}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'AppID') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'AppSecret') ?>

    <?= $form->field($model, 'Token') ?>

    <?= $form->field($model, 'EncodingAESKey') ?>

    <?php // echo $form->field($model, 'mode') ?>

    <?php // echo $form->field($model, 'access_token') ?>

    <?php // echo $form->field($model, 'use') ?>

    <?php // echo $form->field($model, 'expires_in') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'curl_log') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
