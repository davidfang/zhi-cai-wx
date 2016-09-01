<?php
/**
* WxResponseKeyvalue搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:33:37*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxResponseKeyvalue;

/**
 * WxResponseKeyvalueSearch represents the model behind the search form about `ZhiCaiWX\models\WxResponseKeyvalue`.
 */
class WxResponseKeyvalueSearch extends WxResponseKeyvalue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'keyword_id', 'reply_id'], 'integer'],
            [['created_at'], 'safe'],
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
        $query = WxResponseKeyvalue::find();

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
            'keyword_id' => $this->keyword_id,
            'reply_id' => $this->reply_id,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
    }
}
