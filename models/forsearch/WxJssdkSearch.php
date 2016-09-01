<?php
/**
* WxJssdk搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:14:47*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxJssdk;

/**
 * WxJssdkSearch represents the model behind the search form about `ZhiCaiWX\models\WxJssdk`.
 */
class WxJssdkSearch extends WxJssdk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'errcode', 'expire_time'], 'integer'],
            [['errmsg', 'jsapi_ticket', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WxJssdk::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '10',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'errcode' => $this->errcode,
            'expire_time' => $this->expire_time,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'errmsg', $this->errmsg])
            ->andFilterWhere(['like', 'jsapi_ticket', $this->jsapi_ticket]);

        return $dataProvider;
    }
}
