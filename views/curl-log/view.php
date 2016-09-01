<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxCurlLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wx Curl Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-curl-log-view">

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
            'queryUrl:url',
            'param',
            'method',
            'is_json',
            'is_urlcode:url',
            'ret',
            'created_at',
],
    ]) ?>

</div>
