<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxWechat */

$this->title = '编辑 Wx Wechat: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wx Wechats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->AppID]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="wx-wechat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
       'model' => $model,
    ]) ?>

</div>