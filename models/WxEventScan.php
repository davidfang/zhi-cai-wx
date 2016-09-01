<?php

namespace ZhiCaiWX\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * "zc_wx_event_scan"表的model
 *
 * @property integer $id
 * @property string $tousername
 * @property string $fromusername
 * @property integer $createtime
 * @property string $msgtype
 * @property string $event
 * @property string $eventkey
 * @property string $ticket
 * @property string $created_at
 */
class WxEventScan extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_event_scan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tousername', 'fromusername', 'createtime', 'msgtype', 'event', 'eventkey', 'ticket'], 'required'],
            [['createtime'], 'integer'],
            [['created_at'], 'safe'],
            [['tousername', 'fromusername', 'ticket'], 'string', 'max' => 50],
            [['msgtype'], 'string', 'max' => 10],
            [['event'], 'string', 'max' => 15],
            [['eventkey'], 'string', 'max' => 100]
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
            'tousername',// '开发者微信号',
            'fromusername',// '发送方帐号（一个OpenID）',
            'createtime',// '消息创建时间 （整型）',
            'msgtype',// '消息类型，event',
            'event',// '事件类型，subscribe，SCAN',
            'eventkey',// '事件KEY值，qrscene_为前缀，后面为二维码的参数值或者是一个32位无符号整数，即创建二维码时的二维码scene_id',
            'ticket',// '二维码的ticket，可用来换取二维码图片',
            'created_at',// '建立时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tousername' => '开发者微信号',
            'fromusername' => '发送方帐号（一个OpenID）',
            'createtime' => '消息创建时间 （整型）',
            'msgtype' => '消息类型，event',
            'event' => '事件类型，subscribe，SCAN',
            'eventkey' => '事件KEY值，qrscene_为前缀，后面为二维码的参数值或者是一个32位无符号整数，即创建二维码时的二维码scene_id',
            'ticket' => '二维码的ticket，可用来换取二维码图片',
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
