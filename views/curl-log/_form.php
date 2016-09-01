<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxCurlLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-curl-log-form">

    <?php $form = ActiveForm::begin([
       'id' => 'w0',
       'options' => ['class' => 'form-horizontal' ],
        'fieldConfig' => [
            'template' => "<div class=\"control-group\">{label}\n<div class=\"col-lg-2 controls\">{input}</div>\n<div class=\"col-lg-8\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'queryUrl')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'param')->textInput(['maxlength' => 1500]) ?>

    <?= $form->field($model, 'method')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'is_json')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'is_urlcode')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'ret')->textInput(['maxlength' => 10000]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
