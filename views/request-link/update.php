<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxRequestLink */

$this->title = '编辑 Wx Request Link: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Wx Request Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->msgid]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="wx-request-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
       'model' => $model,
    ]) ?>

</div>