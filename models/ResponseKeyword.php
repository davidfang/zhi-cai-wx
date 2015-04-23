<?php
namespace ZhiCaiWX\models;
use yii\db\ActiveRecord;
/**
 * Created by David Fang.
 * User: David_fang
 * Date: 15-2-10
 * Time: 下午2:56
 * To change this template use File | Settings | File Templates.
 */
class ResponseKeyword extends ActiveRecord
{
    public static  function tableName(){
        return '{{%wx_response_keyword}}';
    }

    /**
     * 获取关键词对应的回复值
     * 取的时候使用
     * $keyword = models\ResponseKeyword::findOne(1);
     * $keyvalue = $keyword->keyValue;
     */
    public function getKeyValue(){
        //return $this->hasOne(ResponseKeyvalue::className(),['keyword_id'=>'id']);//->asArray();
        //->inverseOf('{{%wx_response_key_value}}')证明两个表是反向关系
        return $this->hasMany(ResponseKeyvalue::className(),['keyword_id'=>'id'])->inverseOf('keyWord');//->asArray();
    }
    /**
     * 获取对应一条回复信息（不适合多图文回复）
     * @return mixed
     */
    public function getReply(){
        return $this->hasOne(ResponseReply::className(),['id'=>'reply_id'])->viaTable('{{%wx_response_key_value}}',['keyword_id'=>'id'])->where('type = :type', [':type' => $this->type])->orderBy('priority');//->asArray();
    }
    /**
     * 获取对应回复信息
     * @return mixed
     */
    public function getReplys(){
        return $this->hasMany(ResponseReply::className(),['id'=>'reply_id'])->viaTable('{{%wx_response_key_value}}',['keyword_id'=>'id'])->where('type = :type', [':type' => $this->type])->orderBy('priority');//->asArray();
    }

}