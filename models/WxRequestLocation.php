<?php

namespace ZhiCaiWX\models;

use Yii;

/**
 * "zc_wx_request_location"表的model
 *
 * @property string $tousername
 * @property string $fromusername
 * @property integer $createtime
 * @property string $msgtype
 * @property double $location_x
 * @property double $location_y
 * @property string $scale
 * @property string $label
 * @property string $msgid
 * @property string $created_at
 */
class WxRequestLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_request_location}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tousername', 'fromusername', 'createtime', 'msgtype', 'location_x', 'location_y', 'scale', 'label', 'msgid'], 'required'],
            [['createtime'], 'integer'],
            [['location_x', 'location_y'], 'string'],
            [['created_at'], 'safe'],
            [['tousername', 'fromusername'], 'string', 'max' => 50],
            [['msgtype', 'scale'], 'string', 'max' => 10],
            [['label'], 'string', 'max' => 100],
            [['msgid'], 'string', 'max' => 64]
        ];
    }
    /**
    * 设置自动创建和更新时间的操作
    * @inheritdoc
    */
    public function behaviors(){
        return [
            yii\behaviors\TimestampBehavior::className(),
        ];
    }
    /**
     * 设置列表页显示列和搜索列
     * @inheritdoc
     */
    public function getIndexLists()
    {
        return [
            'tousername',// '开发者微信号',
            'fromusername',// '发送方帐号（一个OpenID）',
            'createtime',// '消息创建时间 （整型）',
            'msgtype',// '消息类型，location',
            'location_x',// '地理位置维度',
            'location_y',// '地理位置经度',
            'scale',// '地图缩放大小',
            'label',// '地理位置信息',
            'msgid',// '消息id，64位整型',
            'created_at',// '建立时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tousername' => '开发者微信号',
            'fromusername' => '发送方帐号（一个OpenID）',
            'createtime' => '消息创建时间 （整型）',
            'msgtype' => '消息类型，location',
            'location_x' => '地理位置维度',
            'location_y' => '地理位置经度',
            'scale' => '地图缩放大小',
            'label' => '地理位置信息',
            'msgid' => '消息id，64位整型',
            'created_at' => '建立时间',
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
