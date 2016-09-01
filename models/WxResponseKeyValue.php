<?php

namespace ZhiCaiWX\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * "zc_wx_response_key_value"表的model
 *
 * @property integer $id
 * @property integer $keyword_id
 * @property integer $reply_id
 * @property string $created_at
 */
class WxResponseKeyValue extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_response_key_value}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keyword_id', 'reply_id'], 'required'],
            [['keyword_id', 'reply_id'], 'integer'],
            [['created_at'], 'safe']
        ];
    }
    /**
     * 设置自动创建和更新时间的操作
     * @inheritdoc
     */
    public function behaviors(){
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],

        ];
    }
    /**
     * 设置列表页显示列和搜索列
     * @inheritdoc
     */
    public function getIndexLists()
    {
        return [
            'id',// 'ID',
            'keyword_id',// 'Keyword ID',
            'reply_id',// 'Reply ID',
            'created_at',// 'Created At',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keyword_id' => 'Keyword ID',
            'reply_id' => 'Reply ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * 多选项配置
     * @return array
     */
    public function getOptions()
    {
          return [];
    }

    /**
     * toolbars工具栏按钮设定
     * 字段为枚举类型时存在
     * 默认为复选项的值，
     * jsfunction默认值为changeStatus
     * @return array
     * 返回值举例：
     * [
     *  ['name'=>'忘却',//名称
     *  'jsfunction'=>'ask',//js操作方法，默认为：changeStatus
     *  'field'=>'status_2',//操作字段名
     *  'field_value'=>'3'],//修改后的值
     *  ]
     */
    public function getToolbars()
    {
        $attributeLabels = $this->attributeLabels();
        $options = $this->options;
        return [
            ];
    }
    /**
     * 获取关键词
     * 取的时候使用
     * $keyword = models\ResponseKeyvalue::findOne(1);
     * $keyvalue = $keyword->keyWord;
     */
    public function getKeyWord(){
        return $this->hasOne(WxResponseKeyword::className(),['id'=>'keyword_id']);//->asArray();
    }
}
