<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ZhiCaiWX\models\forsearch\WxRequestImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wx Request Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-request-image-index">

    <p>
        <?= Html::a('添加 Wx Request Image', ['create'], ['class' => 'btn btn-success']) ?>
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
           'tousername',
           'fromusername',
           'createtime:datetime',
           'msgtype',
           'picurl:url',
           //'mediaid',
           //'msgid',
[
                'attribute' => 'created_at',
                'format' => 'html',
                'value' => 'created_at',
                'filter' => kartik\widgets\DatePicker::widget(
                    ['model' => $searchModel,
                       'name' => Html::getInputName($searchModel, 'created_at'),
                       'value' => $searchModel->created_at,
                       'pluginOptions' => ['format' => 'yyyy-mm-dd',
                           'todayHighlight' => true,]
                    ]),
                'options' => ['style' => 'width:200px;'],

            ],
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