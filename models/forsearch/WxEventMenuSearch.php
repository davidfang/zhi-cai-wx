<?php
/**
* WxEventMenu搜索模型
* Created by David
* User: David.Fang
* Date: 2016-09-01* Time: 12:10:49*/
namespace ZhiCaiWX\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZhiCaiWX\models\WxEventMenu;

/**
 * WxEventMenuSearch represents the model behind the search form about `ZhiCaiWX\models\WxEventMenu`.
 */
class WxEventMenuSearch extends WxEventMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'createtime', 'count'], 'integer'],
            [['tousername', 'fromusername', 'msgtype', 'event', 'eventkey', 'scancodeinfo', 'scantype', 'scanresult', 'sendpicsinfo', 'piclist', 'picmd5sum', 'sendlocationinfo', 'location_x', 'location_y', 'scale', 'label', 'poiname', 'created_at'], 'safe'],
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
        $query = WxEventMenu::find();

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
            'count' => $this->count,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'tousername', $this->tousername])
            ->andFilterWhere(['like', 'fromusername', $this->fromusername])
            ->andFilterWhere(['like', 'msgtype', $this->msgtype])
            ->andFilterWhere(['like', 'event', $this->event])
            ->andFilterWhere(['like', 'eventkey', $this->eventkey])
            ->andFilterWhere(['like', 'scancodeinfo', $this->scancodeinfo])
            ->andFilterWhere(['like', 'scantype', $this->scantype])
            ->andFilterWhere(['like', 'scanresult', $this->scanresult])
            ->andFilterWhere(['like', 'sendpicsinfo', $this->sendpicsinfo])
            ->andFilterWhere(['like', 'piclist', $this->piclist])
            ->andFilterWhere(['like', 'picmd5sum', $this->picmd5sum])
            ->andFilterWhere(['like', 'sendlocationinfo', $this->sendlocationinfo])
            ->andFilterWhere(['like', 'location_x', $this->location_x])
            ->andFilterWhere(['like', 'location_y', $this->location_y])
            ->andFilterWhere(['like', 'scale', $this->scale])
            ->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'poiname', $this->poiname]);

        return $dataProvider;
    }
}
