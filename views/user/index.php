<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ZhiCaiWX\models\forsearch\WxUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wx Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-user-index">

    <p>
        <?= Html::a('添加 Wx User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo $this->render("_toolbar", ["model" => $dataProvider]); ?>
    <?= GridView::widget([
        'id' => 'grid',
        //重新定义分页样式
        'layout' => '{items}{pager}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn', 'options' => ['id' => 'grid']],
           'openid',
           'subscribe',
           'nickname',
           'sex',
           'city',
           //'country',
           //'province',
           //'language',
           //'headimgurl:url',
           //'subscribe_time:datetime',
           //'unionid',
           //'remark',
           //'privilege',
           //'created_at',
           //'updated_at',
[
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'buttons' => [
               ],
                'template' => ' {view} {update}{delete} ',
            ]
        ],
    ]);
    ?>
</div>