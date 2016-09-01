<?php

namespace ZhiCaiWX\models;

use Yii;

/**
 * "zc_wx_jssdk"表的model
 *
 * @property integer $id
 * @property integer $errcode
 * @property string $errmsg
 * @property string $jsapi_ticket
 * @property integer $expire_time
 * @property string $created_at
 */
class WxJssdk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_jssdk}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['errcode', 'errmsg', 'jsapi_ticket', 'expire_time'], 'required'],
            [['errcode', 'expire_time'], 'integer'],
            [['created_at'], 'safe'],
            [['errmsg', 'jsapi_ticket'], 'string', 'max' => 255]
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
            'errcode',// 'Errcode',
            'errmsg',// 'Errmsg',
            'jsapi_ticket',// 'Jsapi Ticket',
            'expire_time',// '有效期',
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
            'errcode' => 'Errcode',
            'errmsg' => 'Errmsg',
            'jsapi_ticket' => 'Jsapi Ticket',
            'expire_time' => '有效期',
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
