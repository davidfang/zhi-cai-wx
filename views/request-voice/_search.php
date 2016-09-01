<?php

use yii\helpers\Html;
use zc\gii\bs3activeform\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\forsearch\WxRequestVoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default wx-request-voice-search">

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

    <?= $form->field($model, 'mediaid') ?>

    <?php // echo $form->field($model, 'format') ?>

    <?php // echo $form->field($model, 'msgid') ?>

    <?php // echo $form->field($model, 'recognition') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
