<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxResponseKeyword */

$this->title = '添加 Wx Response Keyword';
$this->params['breadcrumbs'][] = ['label' => 'Wx Response Keywords', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-response-keyword-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
