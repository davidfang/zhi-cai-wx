<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxRequestVoice */

$this->title = '编辑 Wx Request Voice: ' . ' ' . $model->msgid;
$this->params['breadcrumbs'][] = ['label' => 'Wx Request Voices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msgid, 'url' => ['view', 'id' => $model->msgid]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="wx-request-voice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
       'model' => $model,
    ]) ?>

</div>