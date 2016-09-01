<?php

namespace ZhiCaiWX\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * "zc_wx_scene"表的model
 *
 * @property integer $id
 * @property string $name
 * @property string $describtion
 * @property integer $subscribeNumber
 * @property string $type
 * @property integer $expireSeconds
 * @property integer $sceneId
 * @property string $ticket
 * @property string $ticketTime
 * @property string $isCreated
 * @property integer $created_at
 * @property integer $updated_at
 */
class WxScene extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_scene}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sceneId'], 'required'],
            [['subscribeNumber', 'expireSeconds', 'sceneId', 'created_at', 'updated_at'], 'integer'],
            [['type', 'isCreated'], 'string'],
            [['ticketTime'], 'safe'],
            [['name', 'describtion', 'ticket'], 'string', 'max' => 255]
        ];
    }
    /**
    * 设置自动创建和更新时间的操作
    * @inheritdoc
    */
    public function behaviors(){
        return [
            \yii\behaviors\TimestampBehavior::className(),
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
            'name',// '场景名称',
            'describtion',// '场景简介',
            'subscribeNumber',// '场景关注人数',
            'type',// '类型，临时二维码类型为1，永久二维码类型为2',
            'expireSeconds',// '过期时间，只在类型为临时二维码时有效。最大为1800秒',
            'sceneId',// '场景值ID，临时二维码时为32位非0整型，永久二维码时最大值为100000（目前参数只支持1--100000)',
            'ticket',// 'ticket',
            'ticketTime',// '二维码生成时间',
            'isCreated',// '是否生成二维码',
            'created_at',// '建立时间',
            'updated_at',// '更新时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '场景名称',
            'describtion' => '场景简介',
            'subscribeNumber' => '场景关注人数',
            'type' => '类型，临时二维码类型为1，永久二维码类型为2',
            'expireSeconds' => '过期时间，只在类型为临时二维码时有效。最大为1800秒',
            'sceneId' => '场景值ID，临时二维码时为32位非0整型，永久二维码时最大值为100000（目前参数只支持1--100000)',
            'ticket' => 'ticket',
            'ticketTime' => '二维码生成时间',
            'isCreated' => '是否生成二维码',
            'created_at' => '建立时间',
            'updated_at' => '更新时间',
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

}
