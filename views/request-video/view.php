<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxRequestVideo */

$this->title = $model->msgid;
$this->params['breadcrumbs'][] = ['label' => 'Wx Request Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-request-video-view">

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
            'mediaid',
            'thumbmediaid',
            'msgid',
            'created_at',
],
    ]) ?>

</div>
