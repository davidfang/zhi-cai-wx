<?php

namespace ZhiCaiWX\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * "zc_wx_wechat"表的model
 *
 * @property string $AppID
 * @property string $name
 * @property string $AppSecret
 * @property string $Token
 * @property string $EncodingAESKey
 * @property string $mode
 * @property string $access_token
 * @property integer $use
 * @property integer $expires_in
 * @property string $created_at
 * @property integer $updated_at
 * @property integer $curl_log
 */
class WxWechat extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_wechat}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AppID', 'name', 'AppSecret', 'Token', 'EncodingAESKey', 'access_token'], 'required'],
            [['mode', 'access_token'], 'string'],
            [['use', 'expires_in', 'updated_at', 'curl_log'], 'integer'],
            [['created_at'], 'safe'],
            [['AppID', 'name', 'AppSecret', 'Token', 'EncodingAESKey'], 'string', 'max' => 50]
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
            'AppID',// 'AppID(应用ID)',
            'name',// '名称',
            'AppSecret',// 'AppSecret(应用密钥)',
            'Token',// 'Token(令牌)',
            'EncodingAESKey',// 'EncodingAESKey(消息加解密密钥)',
            'mode',// '消息加解密模式: 0明文模式, 1兼容模式, 2安全模式',
            'access_token',// 'access_token',
            'use',// '当前是否使用',
            'expires_in',// 'access_token有效时长(秒)',
            'created_at',// '创建时间',
            'updated_at',// '更新时间',
            'curl_log',// '是否腾讯接口日志',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AppID' => 'AppID(应用ID)',
            'name' => '名称',
            'AppSecret' => 'AppSecret(应用密钥)',
            'Token' => 'Token(令牌)',
            'EncodingAESKey' => 'EncodingAESKey(消息加解密密钥)',
            'mode' => '消息加解密模式: 0明文模式, 1兼容模式, 2安全模式',
            'access_token' => 'access_token',
            'use' => '当前是否使用',
            'expires_in' => 'access_token有效时长(秒)',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'curl_log' => '是否腾讯接口日志',
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
     * 获取当前可用的微信配置信息
     * @param bool $newcache 是否新生成缓存
     * @return array|bool|mixed|null|ActiveRecord
     */
    public static function getCurrent($newcache = false){
        $cache = Yii::$app->cache;
        $key = 'wechat_current';
        $current = $newcache?false:$cache->get($key);
        if($current == false){
            $current = self::find()->where(['use'=>1])->asArray()->one();
            $cache->set($key,$current);
        }
        return $current;
    }
}
