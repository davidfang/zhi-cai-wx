<?php
/**
* WxRequestLocation搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:22:34*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxRequestLocation;

/**
 * WxRequestLocationSearch represents the model behind the search form about `ZhiCaiWX\models\WxRequestLocation`.
 */
class WxRequestLocationSearch extends WxRequestLocation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tousername', 'fromusername', 'msgtype', 'location_x', 'location_y', 'scale', 'label', 'msgid', 'created_at'], 'safe'],
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
        $query = WxRequestLocation::find();

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
            ->andFilterWhere(['like', 'location_x', $this->location_x])
            ->andFilterWhere(['like', 'location_y', $this->location_y])
            ->andFilterWhere(['like', 'scale', $this->scale])
            ->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'msgid', $this->msgid]);

        return $dataProvider;
    }
}
