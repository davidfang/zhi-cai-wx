<?php
/**
* ErrorLogController控制器
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 11:44:13*/
namespace ZhiCaiWX\controllers;

use Yii;
use ZhiCaiWX\models\WxErrorLog;
use ZhiCaiWX\models\forsearch\WxErrorLogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ErrorLogController 控制器对 WxErrorLog 模型 CRUD 操作.
 */
class ErrorLogController extends Controller
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
     *  WxErrorLog 模型列表.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WxErrorLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * WxErrorLog 模型详情
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
     * Creates a new WxErrorLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WxErrorLog();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                                $uploadFile = UploadedFile::getInstance($model,'file');
                $newurl = "uploads/" . date('YmdHis-').rand(100,999). '.' .
                $uploadFile->extension;
                $uploadFile->saveAs($newurl);
                $model->file = $newurl;
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
     * WxErrorLog 模型更新操作
     * 如果更新成功将跳转到“查看”页面
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
                        $oldUrl['file'] = $model->file;
                    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
	                $uploadFile = UploadedFile::getInstance($model,'file');
                if($uploadFile) {
                    $newurl = "uploads/" . date('YmdHis-').rand(100,999). '.' .
                    $uploadFile->extension;
                    $uploadFile->saveAs($newurl);
                    $model->file = $newurl;
                }else{
                    $model->file = $oldUrl['file'];
                }
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
     * WxErrorLog模型删除操作
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
    * WxErrorLog模型状态修改Ajax操作
    * 备注：将所有主键为$keys的$f字段改为$v状态
    * @param $f 操作字段名
    * @param $v 操作字段值
    * @param array $keys 将修改状态的主键
    * @return array
    * {status: true, msg: "更新成功2条数据。"}
    */
    public function actionChangeStatusAjax($f,$v,array $keys){
        $return = ['status'=>false,'msg'=>''];
        $model = new WxErrorLog();
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
     * 根据primary key查找 WxErrorLog 模型的信息
     * 如果数据不存在跳转到 404
     * @param integer $id
     * @return WxErrorLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WxErrorLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
