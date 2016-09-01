<?php
namespace ZhiCaiWX\models;
use Yii;
use yii\db\ActiveRecord;

/**
 * Created by David Fang.
 * User: david_fang
 * Date: 15-2-8
 * Time: 下午6:24
 * To change this template use File | Settings | File Templates.
 */

class Wechat extends ActiveRecord{
    public static function tableName(){
        return '{{%wx_wechat}}';
    }
    public function behaviors(){
        return [
            TimestampBehavior::className(),
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