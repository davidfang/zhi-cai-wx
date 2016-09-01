<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxCurlLog */

$this->title = '编辑 Wx Curl Log: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wx Curl Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="wx-curl-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
       'model' => $model,
    ]) ?>

</div>