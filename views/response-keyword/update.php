<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxResponseKeyword */

$this->title = '编辑 Wx Response Keyword: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wx Response Keywords', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="wx-response-keyword-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
       'model' => $model,
    ]) ?>

</div>