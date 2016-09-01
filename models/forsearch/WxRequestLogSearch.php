<?php
/**
* WxRequestLog搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:26:07*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxRequestLog;

/**
 * WxRequestLogSearch represents the model behind the search form about `ZhiCaiWX\models\WxRequestLog`.
 */
class WxRequestLogSearch extends WxRequestLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'speed'], 'integer'],
            [['get', 'post', 'created_at'], 'safe'],
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
        $query = WxRequestLog::find();

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
            'speed' => $this->speed,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'get', $this->get])
            ->andFilterWhere(['like', 'post', $this->post]);

        return $dataProvider;
    }
}
