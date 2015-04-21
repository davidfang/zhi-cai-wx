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
class RequestLink extends ActiveRecord
{
    public static  function tableName(){
        return '{{%request_link}}';
    }

}