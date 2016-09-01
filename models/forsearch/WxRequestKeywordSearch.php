<?php
/**
* WxRequestKeyword搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:19:49*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxRequestKeyword;

/**
 * WxRequestKeywordSearch represents the model behind the search form about `ZhiCaiWX\models\WxRequestKeyword`.
 */
class WxRequestKeywordSearch extends WxRequestKeyword
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'times', 'created_at', 'updated_at'], 'integer'],
            [['keyword'], 'safe'],
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
        $query = WxRequestKeyword::find();

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
            'times' => $this->times,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'keyword', $this->keyword]);

        return $dataProvider;
    }
}
