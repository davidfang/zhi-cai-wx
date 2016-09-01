<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxJssdk */

$this->title = '添加 Wx Jssdk';
$this->params['breadcrumbs'][] = ['label' => 'Wx Jssdks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-jssdk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
