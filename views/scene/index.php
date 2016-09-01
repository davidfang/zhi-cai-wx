<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ZhiCaiWX\models\forsearch\WxSceneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wx Scenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-scene-index">

    <p>
        <?= Html::a('添加 Wx Scene', ['create'], ['class' => 'btn btn-success']) ?>
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
           'id',
           'name',
           'describtion',
           'subscribeNumber',
           'type',
           //'expireSeconds',
           //'sceneId',
           //'ticket',
[
                'attribute' => 'ticketTime',
                'format' => 'html',
                'value' => 'ticketTime',
                'filter' => kartik\widgets\DatePicker::widget(
                    ['model' => $searchModel,
                       'name' => Html::getInputName($searchModel, 'ticketTime'),
                       'value' => $searchModel->ticketTime,
                       'pluginOptions' => ['format' => 'yyyy-mm-dd',
                           'todayHighlight' => true,]
                    ]),
                'options' => ['style' => 'width:200px;'],

            ],
                       //'isCreated',
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