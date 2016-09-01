<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxWechat */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wx Wechats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-wechat-view">

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->AppID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->AppID], [
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
            'AppID',
            'name',
            'AppSecret',
            'Token',
            'EncodingAESKey',
            'mode',
            'access_token:ntext',
            'use',
            'expires_in',
            'created_at',
            'updated_at',
            'curl_log:url',
],
    ]) ?>

</div>
