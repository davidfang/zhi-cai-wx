<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxErrorLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wx Error Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-error-log-view">

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
            'errcode',
            'errmsg',
            'file',
            'line_code',
            'created_at',
],
    ]) ?>

</div>
