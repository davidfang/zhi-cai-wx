<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxEventScan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-event-scan-form">

    <?php $form = ActiveForm::begin([
       'id' => 'w0',
       'options' => ['class' => 'form-horizontal' ],
        'fieldConfig' => [
            'template' => "<div class=\"control-group\">{label}\n<div class=\"col-lg-2 controls\">{input}</div>\n<div class=\"col-lg-8\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'tousername')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'fromusername')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'createtime')->textInput() ?>

    <?= $form->field($model, 'msgtype')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'event')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'eventkey')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ticket')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
