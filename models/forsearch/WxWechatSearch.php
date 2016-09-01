<?php
/**
* WxWechat搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:40:09*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxWechat;

/**
 * WxWechatSearch represents the model behind the search form about `ZhiCaiWX\models\WxWechat`.
 */
class WxWechatSearch extends WxWechat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AppID', 'name', 'AppSecret', 'Token', 'EncodingAESKey', 'mode', 'access_token', 'created_at'], 'safe'],
            [['use', 'expires_in', 'updated_at', 'curl_log'], 'integer'],
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
        $query = WxWechat::find();

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
            'use' => $this->use,
            'expires_in' => $this->expires_in,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'curl_log' => $this->curl_log,
        ]);

        $query->andFilterWhere(['like', 'AppID', $this->AppID])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'AppSecret', $this->AppSecret])
            ->andFilterWhere(['like', 'Token', $this->Token])
            ->andFilterWhere(['like', 'EncodingAESKey', $this->EncodingAESKey])
            ->andFilterWhere(['like', 'mode', $this->mode])
            ->andFilterWhere(['like', 'access_token', $this->access_token]);

        return $dataProvider;
    }
}
