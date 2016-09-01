<?php
/**
* WechatController控制器
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 11:31:41*/
namespace ZhiCaiWX\controllers;

use Yii;
use ZhiCaiWX\models\WxWechat;
use ZhiCaiWX\models\forsearch\WxWechatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * WechatController 控制器对 WxWechat 模型 CRUD 操作.
 */
class WechatController extends Controller
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
     *  WxWechat 模型列表.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WxWechatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * WxWechat 模型详情
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WxWechat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WxWechat();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                                $model->save();
                return $this->redirect(['view', 'id' => $model->AppID]);
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
     * WxWechat 模型更新操作
     * 如果更新成功将跳转到“查看”页面
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
                if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
	                $model->save();
           	 return $this->redirect(['view', 'id' => $model->AppID]);
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
     * WxWechat模型删除操作
     * 如果删除成功，跳转到“列表”页
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    /**
    * WxWechat模型状态修改Ajax操作
    * 备注：将所有主键为$keys的$f字段改为$v状态
    * @param $f 操作字段名
    * @param $v 操作字段值
    * @param array $keys 将修改状态的主键
    * @return array
    * {status: true, msg: "更新成功2条数据。"}
    */
    public function actionChangeStatusAjax($f,$v,array $keys){
        $return = ['status'=>false,'msg'=>''];
        $model = new WxWechat();
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
     * 根据primary key查找 WxWechat 模型的信息
     * 如果数据不存在跳转到 404
     * @param string $id
     * @return WxWechat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WxWechat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
