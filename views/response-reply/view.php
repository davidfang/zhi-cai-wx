<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxResponseReply */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Wx Response Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-response-reply-view">

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
            'keyword',
            'type',
            'title',
            'url:url',
            'description',
            'picture',
            'icon',
            'musicurl:url',
            'hqmusicurl:url',
            'thumbmediaid',
            'voice',
            'video',
        [
        'attribute'=>'image',
        'format' =>'html',
        'value'=>Html::img(Yii::$app->homeUrl .$model->image,['width'=>'120px'])
        ],
                 'mediaid',
            'priority',
            'show_times:datetime',
            'created_at',
],
    ]) ?>

</div>
