<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxResponseReply */

$this->title = '添加 Wx Response Reply';
$this->params['breadcrumbs'][] = ['label' => 'Wx Response Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-response-reply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
