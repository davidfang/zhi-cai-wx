<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxUser */

$this->title = '编辑 Wx User: ' . ' ' . $model->openid;
$this->params['breadcrumbs'][] = ['label' => 'Wx Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->openid, 'url' => ['view', 'id' => $model->openid]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="wx-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
       'model' => $model,
    ]) ?>

</div>