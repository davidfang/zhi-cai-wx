<?php
namespace ZhiCaiWX\models;

use yii\db\ActiveRecord;
/**
 * Created by David Fang.
 * User: David_fang
 * Date: 15-2-6
 * Time: 下午5:54
 * To change this template use File | Settings | File Templates.
 */
class RequestLog extends ActiveRecord
{
    public static  function tableName(){
        return '{{%request_log}}';
    }
}

