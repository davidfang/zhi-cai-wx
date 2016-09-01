<?php
/**
* WxRequestText搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:27:18*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxRequestText;

/**
 * WxRequestTextSearch represents the model behind the search form about `ZhiCaiWX\models\WxRequestText`.
 */
class WxRequestTextSearch extends WxRequestText
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tousername', 'fromusername', 'msgtype', 'content', 'msgid', 'created_at'], 'safe'],
            [['createtime'], 'integer'],
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
        $query = WxRequestText::find();

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
            'createtime' => $this->createtime,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'tousername', $this->tousername])
            ->andFilterWhere(['like', 'fromusername', $this->fromusername])
            ->andFilterWhere(['like', 'msgtype', $this->msgtype])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'msgid', $this->msgid]);

        return $dataProvider;
    }
}
