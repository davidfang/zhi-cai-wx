<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxMenu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wx Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-menu-view">

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
            'pid',
            'name',
            'type',
            'code',
            'created_at',
            'updated_at',
            'status',
],
    ]) ?>

</div>
