<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxWechat */

$this->title = '添加 Wx Wechat';
$this->params['breadcrumbs'][] = ['label' => 'Wx Wechats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-wechat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
