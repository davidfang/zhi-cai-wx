<?php
/**
* WxScene搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 15:57:06*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxScene;

/**
 * WxSceneSearch represents the model behind the search form about `ZhiCaiWX\models\WxScene`.
 */
class WxSceneSearch extends WxScene
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subscribeNumber', 'expireSeconds', 'sceneId', 'created_at', 'updated_at'], 'integer'],
            [['name', 'describtion', 'type', 'ticket', 'ticketTime', 'isCreated'], 'safe'],
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
        $query = WxScene::find();

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
            'subscribeNumber' => $this->subscribeNumber,
            'expireSeconds' => $this->expireSeconds,
            'sceneId' => $this->sceneId,
            'ticketTime' => $this->ticketTime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'describtion', $this->describtion])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'ticket', $this->ticket])
            ->andFilterWhere(['like', 'isCreated', $this->isCreated]);

        return $dataProvider;
    }
}
