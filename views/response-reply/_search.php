<?php

use yii\helpers\Html;
use zc\gii\bs3activeform\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\forsearch\WxResponseReplySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default wx-response-reply-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
        'fieldConfig' => [
            'template' => " {label}\n <div class='col-sm-7'>{input}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'keyword') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'musicurl') ?>

    <?php // echo $form->field($model, 'hqmusicurl') ?>

    <?php // echo $form->field($model, 'thumbmediaid') ?>

    <?php // echo $form->field($model, 'voice') ?>

    <?php // echo $form->field($model, 'video') ?>

    <?php // echo $form->field($model, 'mediaid') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'show_times') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
