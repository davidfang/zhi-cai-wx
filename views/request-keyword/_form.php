<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxRequestKeyword */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-request-keyword-form">

    <?php $form = ActiveForm::begin([
       'id' => 'w0',
       'options' => ['class' => 'form-horizontal' ],
        'fieldConfig' => [
            'template' => "<div class=\"control-group\">{label}\n<div class=\"col-lg-2 controls\">{input}</div>\n<div class=\"col-lg-8\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'times')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>