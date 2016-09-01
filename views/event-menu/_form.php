<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxEventMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-event-menu-form">

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

    <?= $form->field($model, 'msgtype')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'event')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'eventkey')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'scancodeinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'scantype')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'scanresult')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sendpicsinfo')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'piclist')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'picmd5sum')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'sendlocationinfo')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'location_x')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'location_y')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'scale')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'poiname')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
