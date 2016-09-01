<?php
/**
* WxResponseKeyword搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:34:42*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxResponseKeyword;

/**
 * WxResponseKeywordSearch represents the model behind the search form about `ZhiCaiWX\models\WxResponseKeyword`.
 */
class WxResponseKeywordSearch extends WxResponseKeyword
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'priority', 'times'], 'integer'],
            [['keyword', 'type', 'created_at'], 'safe'],
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
        $query = WxResponseKeyword::find();

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
            'priority' => $this->priority,
            'times' => $this->times,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
