<?php
/**
* WxEventSubscribe搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:13:30*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxEventSubscribe;

/**
 * WxEventSubscribeSearch represents the model behind the search form about `ZhiCaiWX\models\WxEventSubscribe`.
 */
class WxEventSubscribeSearch extends WxEventSubscribe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'createtime'], 'integer'],
            [['tousername', 'fromusername', 'msgtype', 'event', 'eventkey', 'created_at'], 'safe'],
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
        $query = WxEventSubscribe::find();

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
            'createtime' => $this->createtime,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'tousername', $this->tousername])
            ->andFilterWhere(['like', 'fromusername', $this->fromusername])
            ->andFilterWhere(['like', 'msgtype', $this->msgtype])
            ->andFilterWhere(['like', 'event', $this->event])
            ->andFilterWhere(['like', 'eventkey', $this->eventkey]);

        return $dataProvider;
    }
}