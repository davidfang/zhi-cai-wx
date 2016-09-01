<?php
/**
* WxCurlLog搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 11:41:41*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxCurlLog;

/**
 * WxCurlLogSearch represents the model behind the search form about `ZhiCaiWX\models\WxCurlLog`.
 */
class WxCurlLogSearch extends WxCurlLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['queryUrl', 'param', 'method', 'is_json', 'is_urlcode', 'ret', 'created_at'], 'safe'],
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
        $query = WxCurlLog::find();

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'queryUrl', $this->queryUrl])
            ->andFilterWhere(['like', 'param', $this->param])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'is_json', $this->is_json])
            ->andFilterWhere(['like', 'is_urlcode', $this->is_urlcode])
            ->andFilterWhere(['like', 'ret', $this->ret]);

        return $dataProvider;
    }
}
