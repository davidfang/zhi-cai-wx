<?php
/**
* WxResponseReply搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:35:43*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxResponseReply;

/**
 * WxResponseReplySearch represents the model behind the search form about `ZhiCaiWX\models\WxResponseReply`.
 */
class WxResponseReplySearch extends WxResponseReply
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'priority', 'show_times'], 'integer'],
            [['keyword', 'type', 'title', 'url', 'description', 'picture', 'icon', 'musicurl', 'hqmusicurl', 'thumbmediaid', 'voice', 'video', 'image', 'mediaid', 'created_at'], 'safe'],
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
        $query = WxResponseReply::find();

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
            'show_times' => $this->show_times,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'musicurl', $this->musicurl])
            ->andFilterWhere(['like', 'hqmusicurl', $this->hqmusicurl])
            ->andFilterWhere(['like', 'thumbmediaid', $this->thumbmediaid])
            ->andFilterWhere(['like', 'voice', $this->voice])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'mediaid', $this->mediaid]);

        return $dataProvider;
    }
}
