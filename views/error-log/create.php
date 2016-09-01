<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxErrorLog */

$this->title = '添加 Wx Error Log';
$this->params['breadcrumbs'][] = ['label' => 'Wx Error Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-error-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
