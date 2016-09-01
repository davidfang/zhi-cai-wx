<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxWechat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-wechat-form">

    <?php $form = ActiveForm::begin([
       'id' => 'w0',
       'options' => ['class' => 'form-horizontal' ],
        'fieldConfig' => [
            'template' => "<div class=\"control-group\">{label}\n<div class=\"col-lg-2 controls\">{input}</div>\n<div class=\"col-lg-8\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'AppID')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'AppSecret')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Token')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'EncodingAESKey')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'mode')->textInput(['maxlength' => 0]) ?>

    <?= $form->field($model, 'access_token')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'use')->textInput() ?>

    <?= $form->field($model, 'expires_in')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'curl_log')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
