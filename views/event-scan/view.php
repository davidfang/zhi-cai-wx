<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxEventScan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wx Event Scans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-event-scan-view">

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除此条信息?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tousername',
            'fromusername',
            'createtime:datetime',
            'msgtype',
            'event',
            'eventkey',
            'ticket',
            'created_at',
],
    ]) ?>

</div>
