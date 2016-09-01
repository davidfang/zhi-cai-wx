<?php

namespace ZhiCaiWX\models;

use Yii;

/**
 * "zc_wx_event_menu"表的model
 *
 * @property integer $id
 * @property string $tousername
 * @property string $fromusername
 * @property integer $createtime
 * @property string $msgtype
 * @property string $event
 * @property string $eventkey
 * @property string $scancodeinfo
 * @property string $scantype
 * @property string $scanresult
 * @property string $sendpicsinfo
 * @property integer $count
 * @property string $piclist
 * @property string $picmd5sum
 * @property string $sendlocationinfo
 * @property string $location_x
 * @property string $location_y
 * @property string $scale
 * @property string $label
 * @property string $poiname
 * @property string $created_at
 */
class WxEventMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_event_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tousername', 'fromusername', 'createtime', 'msgtype', 'event', 'eventkey'], 'required'],
            [['createtime', 'count'], 'integer'],
            [['scancodeinfo', 'scanresult'], 'string'],
            [['created_at'], 'safe'],
            [['tousername', 'fromusername'], 'string', 'max' => 50],
            [['msgtype', 'event', 'poiname'], 'string', 'max' => 20],
            [['eventkey', 'label'], 'string', 'max' => 100],
            [['scantype'], 'string', 'max' => 30],
            [['sendpicsinfo', 'piclist'], 'string', 'max' => 255],
            [['picmd5sum'], 'string', 'max' => 32],
            [['sendlocationinfo', 'location_x', 'location_y', 'scale'], 'string', 'max' => 10]
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
            'id',// 'ID',
            'tousername',// '开发者微信号',
            'fromusername',// '发送方帐号（一个OpenID）',
            'createtime',// '消息创建时间 （整型）',
            'msgtype',// '消息类型，event',
            'event',// '消息类型，event',
            'eventkey',// '事件类型，（click、view、scancode_push、scancode_waitmsg、pic_sysphoto、pic_photo_or_album、pic_weixin、location_select）',
            'scancodeinfo',// '扫描信息（scancode_push,scancode_waitmsg）',
            'scantype',// '扫描类型，一般是qrcode（scancode_push,scancode_waitmsg）',
            'scanresult',// '扫描结果，即二维码对应的字符串信息（scancode_push,scancode_waitmsg）',
            'sendpicsinfo',// '发送的图片信息(pic_sysphoto、pic_photo_or_album、pic_weixin)',
            'count',// '发送的图片数量(pic_sysphoto、pic_photo_or_album、pic_weixin)',
            'piclist',// '图片列表(pic_sysphoto、pic_photo_or_album、pic_weixin)',
            'picmd5sum',// '图片的MD5值，开发者若需要，可用于验证接收到图片(pic_sysphoto、pic_photo_or_album、pic_weixin)',
            'sendlocationinfo',// '发送的位置信息',
            'location_x',// 'X坐标信息',
            'location_y',// 'Y坐标信息',
            'scale',// '精度，可理解为精度或者比例尺、越精细的话 scale越高',
            'label',// '地理位置的字符串信息',
            'poiname',// '朋友圈POI的名字，可能为空',
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
            'event' => '消息类型，event',
            'eventkey' => '事件类型，（click、view、scancode_push、scancode_waitmsg、pic_sysphoto、pic_photo_or_album、pic_weixin、location_select）',
            'scancodeinfo' => '扫描信息（scancode_push,scancode_waitmsg）',
            'scantype' => '扫描类型，一般是qrcode（scancode_push,scancode_waitmsg）',
            'scanresult' => '扫描结果，即二维码对应的字符串信息（scancode_push,scancode_waitmsg）',
            'sendpicsinfo' => '发送的图片信息(pic_sysphoto、pic_photo_or_album、pic_weixin)',
            'count' => '发送的图片数量(pic_sysphoto、pic_photo_or_album、pic_weixin)',
            'piclist' => '图片列表(pic_sysphoto、pic_photo_or_album、pic_weixin)',
            'picmd5sum' => '图片的MD5值，开发者若需要，可用于验证接收到图片(pic_sysphoto、pic_photo_or_album、pic_weixin)',
            'sendlocationinfo' => '发送的位置信息',
            'location_x' => 'X坐标信息',
            'location_y' => 'Y坐标信息',
            'scale' => '精度，可理解为精度或者比例尺、越精细的话 scale越高',
            'label' => '地理位置的字符串信息',
            'poiname' => '朋友圈POI的名字，可能为空',
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
