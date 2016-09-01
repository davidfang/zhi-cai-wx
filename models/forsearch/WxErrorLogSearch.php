<?php
/**
* WxErrorLog搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 11:44:13*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxErrorLog;

/**
 * WxErrorLogSearch represents the model behind the search form about `ZhiCaiWX\models\WxErrorLog`.
 */
class WxErrorLogSearch extends WxErrorLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['errcode', 'errmsg', 'file', 'line_code', 'created_at'], 'safe'],
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
        $query = WxErrorLog::find();

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

        $query->andFilterWhere(['like', 'errcode', $this->errcode])
            ->andFilterWhere(['like', 'errmsg', $this->errmsg])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'line_code', $this->line_code]);

        return $dataProvider;
    }
}
