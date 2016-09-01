<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxEventScan */

$this->title = '添加 Wx Event Scan';
$this->params['breadcrumbs'][] = ['label' => 'Wx Event Scans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-event-scan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
