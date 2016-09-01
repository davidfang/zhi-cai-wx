<?php

use yii\helpers\Html;
use zc\gii\bs3activeform\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\forsearch\WxEventMenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default wx-event-menu-search">

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

    <?= $form->field($model, 'tousername') ?>

    <?= $form->field($model, 'fromusername') ?>

    <?= $form->field($model, 'createtime') ?>

    <?= $form->field($model, 'msgtype') ?>

    <?php // echo $form->field($model, 'event') ?>

    <?php // echo $form->field($model, 'eventkey') ?>

    <?php // echo $form->field($model, 'scancodeinfo') ?>

    <?php // echo $form->field($model, 'scantype') ?>

    <?php // echo $form->field($model, 'scanresult') ?>

    <?php // echo $form->field($model, 'sendpicsinfo') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'piclist') ?>

    <?php // echo $form->field($model, 'picmd5sum') ?>

    <?php // echo $form->field($model, 'sendlocationinfo') ?>

    <?php // echo $form->field($model, 'location_x') ?>

    <?php // echo $form->field($model, 'location_y') ?>

    <?php // echo $form->field($model, 'scale') ?>

    <?php // echo $form->field($model, 'label') ?>

    <?php // echo $form->field($model, 'poiname') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
