<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\WxResponseKeyvalue */

$this->title = '添加 Wx Response Keyvalue';
$this->params['breadcrumbs'][] = ['label' => 'Wx Response Keyvalues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-response-keyvalue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
