<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxRequestLink */

$this->title = '添加 Wx Request Link';
$this->params['breadcrumbs'][] = ['label' => 'Wx Request Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-request-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
