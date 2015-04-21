<?php
namespace ZhiCaiWX\models;
use yii\db\ActiveRecord;
/**
 * 关键词回复关系表
 * User: David_fang
 * Date: 15-2-10
 * Time: 下午2:56
 * To change this template use File | Settings | File Templates.
 */
class ResponseKeyvalue extends ActiveRecord
{
    public static  function tableName(){
        return '{{%response_key_value}}';
    }
    /**
     * 获取关键词
     * 取的时候使用
     * $keyword = models\ResponseKeyvalue::findOne(1);
     * $keyvalue = $keyword->keyWord;
     */
    public function getKeyWord(){
        return $this->hasOne(ResponseKeyword::className(),['id'=>'keyword_id']);//->asArray();
    }
}