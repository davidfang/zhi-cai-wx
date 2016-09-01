<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxRequestVideo */

$this->title = '编辑 Wx Request Video: ' . ' ' . $model->msgid;
$this->params['breadcrumbs'][] = ['label' => 'Wx Request Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msgid, 'url' => ['view', 'id' => $model->msgid]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="wx-request-video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
       'model' => $model,
    ]) ?>

</div>