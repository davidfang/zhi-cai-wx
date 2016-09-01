<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxUser */

$this->title = $model->openid;
$this->params['breadcrumbs'][] = ['label' => 'Wx Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-user-view">

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->openid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->openid], [
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
            'openid',
            'subscribe',
            'nickname',
            'sex',
            'city',
            'country',
            'province',
            'language',
            'headimgurl:url',
            'subscribe_time:datetime',
            'unionid',
            'remark',
            'privilege',
            'created_at',
            'updated_at',
],
    ]) ?>

</div>
