<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxEventMenu */

$this->title = '添加 Wx Event Menu';
$this->params['breadcrumbs'][] = ['label' => 'Wx Event Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-event-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
