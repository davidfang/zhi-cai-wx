<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxRequestImage */

$this->title = $model->msgid;
$this->params['breadcrumbs'][] = ['label' => 'Wx Request Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-request-image-view">

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->msgid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->msgid], [
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
            'tousername',
            'fromusername',
            'createtime:datetime',
            'msgtype',
            'picurl:url',
            'mediaid',
            'msgid',
            'created_at',
],
    ]) ?>

</div>
