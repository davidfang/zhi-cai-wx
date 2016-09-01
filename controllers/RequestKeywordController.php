<?php
/**
* RequestKeywordController控制器
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:19:49*/
namespace ZhiCaiWX\controllers;

use Yii;
use ZhiCaiWX\models\WxRequestKeyword;
use ZhiCaiWX\models\forsearch\WxRequestKeywordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * RequestKeywordController 控制器对 WxRequestKeyword 模型 CRUD 操作.
 */
class RequestKeywordController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     *  WxRequestKeyword 模型列表.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WxRequestKeywordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * WxRequestKeyword 模型详情
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WxRequestKeyword model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WxRequestKeyword();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * WxRequestKeyword 模型更新操作
     * 如果更新成功将跳转到“查看”页面
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
                if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
	                $model->save();
           	 return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                 ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * WxRequestKeyword模型删除操作
     * 如果删除成功，跳转到“列表”页
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    /**
    * WxRequestKeyword模型状态修改Ajax操作
    * 备注：将所有主键为$keys的$f字段改为$v状态
    * @param $f 操作字段名
    * @param $v 操作字段值
    * @param array $keys 将修改状态的主键
    * @return array
    * {status: true, msg: "更新成功2条数据。"}
    */
    public function actionChangeStatusAjax($f,$v,array $keys){
        $return = ['status'=>false,'msg'=>''];
        $model = new WxRequestKeyword();
        $data = $model->updateAll([$f=>$v],['id' => $keys]);
        if($data >0) {
            $return['status'] = true;
            $return['msg'] = '更新成功'.$data.'条数据。';
        }else{
            $return['msg'] = '更新失败';
        }
        Yii::$app->response->format = 'json';
        return $return;
    }
    /**
     * 根据primary key查找 WxRequestKeyword 模型的信息
     * 如果数据不存在跳转到 404
     * @param integer $id
     * @return WxRequestKeyword the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WxRequestKeyword::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
