<?php
namespace ZhiCaiWX\models;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * Created by David Fang.
 * User: david_fang
 * Date: 15-2-8
 * Time: 下午6:24
 * To change this template use File | Settings | File Templates.
 */

class Wechat extends ActiveRecord{
    public static function tableName(){
        return '{{%wechat}}';
    }
    public function behaviors(){
        return [
            TimestampBehavior::className(),
        ];
    }
}