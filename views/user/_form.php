<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-user-form">

    <?php $form = ActiveForm::begin([
       'id' => 'w0',
       'options' => ['class' => 'form-horizontal' ],
        'fieldConfig' => [
            'template' => "<div class=\"control-group\">{label}\n<div class=\"col-lg-2 controls\">{input}</div>\n<div class=\"col-lg-8\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'openid')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'subscribe')->textInput() ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'headimgurl')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'subscribe_time')->textInput() ?>

    <?= $form->field($model, 'unionid')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'privilege')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
