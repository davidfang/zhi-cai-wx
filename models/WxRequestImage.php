<?php

namespace ZhiCaiWX\models;

use Yii;

/**
 * "zc_wx_request_image"表的model
 *
 * @property string $tousername
 * @property string $fromusername
 * @property integer $createtime
 * @property string $msgtype
 * @property string $picurl
 * @property string $mediaid
 * @property string $msgid
 * @property string $created_at
 */
class WxRequestImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_request_image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tousername', 'fromusername', 'createtime', 'msgtype', 'picurl', 'mediaid', 'msgid'], 'required'],
            [['createtime'], 'integer'],
            [['created_at'], 'safe'],
            [['tousername', 'fromusername'], 'string', 'max' => 50],
            [['msgtype'], 'string', 'max' => 10],
            [['picurl', 'mediaid'], 'string', 'max' => 100],
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
            'msgtype',// 'image',
            'picurl',// '图片链接',
            'mediaid',// '图片消息媒体id，可以调用多媒体文件下载接口拉取数据。',
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
            'msgtype' => 'image',
            'picurl' => '图片链接',
            'mediaid' => '图片消息媒体id，可以调用多媒体文件下载接口拉取数据。',
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