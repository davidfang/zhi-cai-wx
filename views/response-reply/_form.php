<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxResponseReply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-response-reply-form">

    <?php $form = ActiveForm::begin([
       'id' => 'w0',
       'options' => ['class' => 'form-horizontal' ,'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "<div class=\"control-group\">{label}\n<div class=\"col-lg-2 controls\">{input}</div>\n<div class=\"col-lg-8\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 0]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 10000]) ?>

    <?= $form->field($model, 'picture')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'musicurl')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'hqmusicurl')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'thumbmediaid')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'voice')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'mediaid')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <?= $form->field($model, 'show_times')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
