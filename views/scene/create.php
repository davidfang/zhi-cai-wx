<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxScene */

$this->title = '添加 Wx Scene';
$this->params['breadcrumbs'][] = ['label' => 'Wx Scenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-scene-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>