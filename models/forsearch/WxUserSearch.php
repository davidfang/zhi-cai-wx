<?php
/**
* WxUser搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:37:29*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxUser;

/**
 * WxUserSearch represents the model behind the search form about `ZhiCaiWX\models\WxUser`.
 */
class WxUserSearch extends WxUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['openid', 'nickname', 'city', 'country', 'province', 'language', 'headimgurl', 'unionid', 'remark', 'privilege'], 'safe'],
            [['subscribe', 'sex', 'subscribe_time', 'created_at', 'updated_at'], 'integer'],
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
        $query = WxUser::find();

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
            'subscribe' => $this->subscribe,
            'sex' => $this->sex,
            'subscribe_time' => $this->subscribe_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'headimgurl', $this->headimgurl])
            ->andFilterWhere(['like', 'unionid', $this->unionid])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'privilege', $this->privilege]);

        return $dataProvider;
    }
}
