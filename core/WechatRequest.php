<?php
namespace ZhiCaiWX\core;
use ZhiCaiWX\models;
use ZhiCaiWX\models\User;
/**
 * 处理请求
 * Created by David Fang.
 * Author: David Fang.
 * Date: 13-12-19
 * Time: 下午11:04
 * 
 * 
 */

class WechatRequest{
    /**
     * @descrpition 分发请求
     * @param $request
     * @return array|string
     */
    public static function switchType(&$request){
        $data = array();
        switch ($request['msgtype']) {
            //事件
            case 'event':
                $request['event'] = strtolower($request['event']);
                switch ($request['event']) {
                    //关注
                    case 'subscribe':
                        //二维码关注
                        if(isset($request['eventkey']) && isset($request['ticket'])){
                            $data = self::eventQrsceneSubscribe($request);
                        //普通关注
                        }else{
                            $data = self::eventSubscribe($request);
                        }
                        $write_log_model = new \ZhiCaiWX\models\EventSubscribe();

                        $check_user_info = models\User::findOne($request['fromusername']);//在用户表中检查是否已经有用户信息
                        if(empty($check_user_info)){//不存在的用户，新用户全新写入
                            //记录用户基本信息
                            $user_info = UserManage::getUserInfo($request['fromusername']);
                            $_model_user = new models\User();
                            foreach ($user_info as $key=>$value) {
                                $_model_user->$key = $value;
                            }
                        }else{//新用户更新信息
                            $_model_user =  $check_user_info;
                            $_model_user->subscribe =1;
                            $_model_user->subscribe_time =time();
                        }

                        $_model_user->save();
                        break;
                    //取消关注
                    case 'unsubscribe':
                        $data = self::eventUnsubscribe($request);
                        //更新用户为未关注
                        $write_log_model = new \ZhiCaiWX\models\EventSubscribe();
                        $user = models\User::findOne(['openid'=>$request['fromusername']]);
                        $user->subscribe = 0;
                        $user->save();
                        break;
                    //扫描二维码
                    case 'scan':
                        $data = self::eventScan($request);
                        $write_log_model = new \ZhiCaiWX\models\EventScan();
                        break;
                    //地理位置
                    case 'location':
                        $data = self::eventLocation($request);
                        $write_log_model = new \ZhiCaiWX\models\EventLocation();
                        break;
                    //自定义菜单 - 点击菜单拉取消息时的事件推送
                    case 'click':
                        $data = self::eventClick($request);
                        $write_log_model = new \ZhiCaiWX\models\EventMenu();
                        break;
                    //自定义菜单 - 点击菜单跳转链接时的事件推送
                    case 'view':
                        $data = self::eventView($request);
                        $write_log_model = new \ZhiCaiWX\models\EventMenu();
                        break;
                    //自定义菜单 - 扫码推事件的事件推送
                    case 'scancode_push':
                        $data = self::eventScancodePush($request);
                        $write_log_model = new \ZhiCaiWX\models\EventMenu();
                        break;
                    //自定义菜单 - 扫码推事件且弹出“消息接收中”提示框的事件推送
                    case 'scancode_waitmsg':
                        $data = self::eventScancodeWaitMsg($request);
                        $write_log_model = new \ZhiCaiWX\models\EventMenu();
                        break;
                    //自定义菜单 - 弹出系统拍照发图的事件推送
                    case 'pic_sysphoto':
                        $data = self::eventPicSysPhoto($request);
                        $write_log_model = new \ZhiCaiWX\models\EventMenu();
                        break;
                    //自定义菜单 - 弹出拍照或者相册发图的事件推送
                    case 'pic_photo_or_album':
                        $data = self::eventPicPhotoOrAlbum($request);
                        $write_log_model = new \ZhiCaiWX\models\EventMenu();
                        break;
                    //自定义菜单 - 弹出微信相册发图器的事件推送
                    case 'pic_weixin':
                        $data = self::eventPicWeixin($request);
                        $write_log_model = new \ZhiCaiWX\models\EventMenu();
                        break;
                    //自定义菜单 - 弹出地理位置选择器的事件推送
                    case 'location_select':
                        $data = self::eventLocationSelect($request);
                        $write_log_model = new \ZhiCaiWX\models\EventMenu();
                        break;
                    //群发接口完成后推送的结果
                    case 'masssendjobfinish':
                        $data = self::eventMassSendJobFinish($request);
                        break;
                    //模板消息完成后推送的结果
                    case 'templatesendjobfinish':
                        $data = self::eventTemplateSendJobFinish($request);
                        break;
                    default:
                        return Msg::returnErrMsg(MsgConstant::ERROR_UNKNOW_TYPE, '收到了未知类型的消息', $request);
                        break;
                }
                break;
            //文本
            case 'text':
                $data = self::text($request);
                $write_log_model = new \ZhiCaiWX\models\RequestText();
                break;
            //图像
            case 'image':
                $data = self::image($request);
                $write_log_model = new \ZhiCaiWX\models\RequestImage();
                break;
            //语音
            case 'voice':
                $data = self::voice($request);
                $write_log_model = new \ZhiCaiWX\models\RequestVoice();
                break;
            //视频
            case 'video':
                $data = self::video($request);
                $write_log_model = new \ZhiCaiWX\models\RequestVideo();
                break;
            //位置
            case 'location':
                $data = self::location($request);
                $write_log_model = new \ZhiCaiWX\models\RequestLocation();
                break;
            //链接
            case 'link':
                $data = self::link($request);
                $write_log_model = new \ZhiCaiWX\models\RequestLink();
                break;
            default:
                return ResponsePassive::text($request['fromusername'], $request['tousername'], '收到未知的消息，我不知道怎么处理');
                break;
        }

        $t ='';
        self::traversalRequest($request,$write_log_model,$t);
        $write_log_model->save();//保存日志
        /*//记录所有请求日志  开始
        $_db_request_log = new \app\modules\weixin\models\RequestLog();
        $_db_request_log->get = $_SERVER["QUERY_STRING"];
        $_db_request_log->post = json_encode($request, JSON_UNESCAPED_UNICODE);
        //$_db_request_log->created_at = time();
        $_db_request_log->save();
        //记录所有请求日志  结束
        foreach($request as $key=>$value)
        {
        $t.=($key.'::'.$value."\n");//调试用，正常情况可以删除
        }*/
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $t);

        return $data;
    }

    /**
     * 遍历处理请求
     * @param $request
     * @param $write_log_model
     * @param $t
     */
    public static function traversalRequest($request,&$write_log_model,&$t){
            foreach($request as $key=>$value)
            {
                if(is_object($value)){//当其为数组时，要重新格式化一下
                    $value = (array) $value;
                    $write_log_model->$key = json_encode($value, JSON_UNESCAPED_UNICODE);

                    $child_array = array_change_key_case($value);
                    //if(empty($value)){//当值是空数组时，特殊，不处理

                    //}else
                        if(array_key_exists('item',$child_array)){//当值是item时，特殊，不处理

                    }else{
                        self::traversalRequest($child_array,$write_log_model,$t);
                    }
                    //$callback($child_array);
                    //$t .= json_encode($child_array, JSON_UNESCAPED_UNICODE);
                     /*foreach ($child_array as $child_key => $child_value) {
                        $write_log_model->$child_key = $child_value;
                        $t.=($child_key.'::'.$child_value.'\n');//调试用，正常情况可以删除
                    }*/
                }else{
                $write_log_model->$key = $value;
                $t.=($key.'::'.$value."\n");//调试用，正常情况可以删除
                }
            /*if($key == 'scancodeinfo' ){//and is_array($value)){
                $t .= '////'.json_encode($value, JSON_UNESCAPED_UNICODE).'/////'.gettype($value);
            }*/
            }
    }
    /**
     * @description 根据关键词，查询返回的信息
     * @param $keyword 关键词
     * @param $request 原始请求信息
     * @return string
     */
    public function answer($keyword,&$request){
        $response_keyword = models\ResponseKeyword::findOne(['keyword'=>$keyword]);
        if(empty($response_keyword)){//没有找到关键词
            $request_keyword = models\RequestKeyword::findOne(['keyword'=>$keyword]);
            if(empty($request_keyword)){//没有则新建记录
                $request_keyword = new models\RequestKeyword();
                $request_keyword->keyword = $keyword;
                $request_keyword->save();
            }else{//已有记录，增加次数
                $request_keyword->updateCounters(['times'=>1]);
            }
            return self::answer("默认回复",$request);
        }else{//关键词匹配
            $response_keyword->updateCounters(['times'=>1]);
            switch ($response_keyword->type){//关键词类型
                case 'image':
                    $response_keyword->reply->updateCounters(['show_times'=>1]);//更新展示次数+1
                    return ResponsePassive::image($request['fromusername'], $request['tousername'],$response_keyword->reply->mediaid);
                    break;
                case 'voice':
                    $response_keyword->reply->updateCounters(['show_times'=>1]);//更新展示次数+1
                    return ResponsePassive::voice($request['fromusername'], $request['tousername'],$response_keyword->reply->mediaid);
                    break;
                case 'video':
                    $response_keyword->reply->updateCounters(['show_times'=>1]);//更新展示次数+1
                    return ResponsePassive::video($request['fromusername'], $request['tousername'],$response_keyword->reply->mediaid,$response_keyword->reply->title,$response_keyword->reply->description);
                    break;
                case 'music':
                    $response_keyword->reply->updateCounters(['show_times'=>1]);//更新展示次数+1
                    return ResponsePassive::music($request['fromusername'], $request['tousername'],$response_keyword->reply->title,$response_keyword->reply->description,$response_keyword->reply->musicurl,$response_keyword->reply->hqmusicurl,$response_keyword->reply->thumbmediaid);
                    break;
                case 'news':
                    $items = array();
                    if(count($response_keyword->replys)>1){//多条信息的回复
                        foreach ($response_keyword->replys as $reply) {
                            $reply->updateCounters(['show_times'=>1]);//更新展示次数+1
                            $items[]= ResponsePassive::newsItem($reply->title,$reply->description,$reply->picture,$reply->url);
                        }
                    }else{
                        $response_keyword->reply->updateCounters(['show_times'=>1]);//更新展示次数+1
                        $items[] = ResponsePassive::newsItem($response_keyword->reply->title,$response_keyword->reply->description,$response_keyword->reply->picture,$response_keyword->reply->url);
                    }
                    return ResponsePassive::news($request['fromusername'], $request['tousername'],$items);
                    break;
                default:
                case 'text':
                    $response_keyword->reply->updateCounters(['show_times'=>1]);//更新展示次数+1
                    return ResponsePassive::text($request['fromusername'], $request['tousername'],$response_keyword->reply->description);
                    break;

            }

        }
    }
    /**
     * @descrpition 文本
     * @param $request
     * @return array
     */
    public static function text(&$request){
        $keyword = $request['content'];
        return self::answer($keyword,$request);
        //$content = '收到文本消息';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 图像
     * @param $request
     * @return array
     */
    public static function image(&$request){
        $keyword = '收到图片';
        return self::answer($keyword,$request);
        //$content = '收到图片';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 语音
     * @param $request
     * @return array
     */
    public static function voice(&$request){
        if(!isset($request['recognition'])){
            $content = '收到语音';

        }else{
            $content = '收到语音：'.$request['recognition'];

        }
        $keyword = $content;
        return self::answer($keyword,$request);
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 视频
     * @param $request
     * @return array
     */
    public static function video(&$request){
        $keyword = '收到视频';
        return self::answer($keyword,$request);
        //$content = '收到视频';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 地理
     * @param $request
     * @return array
     */
    public static function location(&$request){
        $keyword = '收到主动上报地理位置';
        return self::answer($keyword,$request);
        //$content = '收到上报的地理位置';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 链接
     * @param $request
     * @return array
     */
    public static function link(&$request){
        $keyword = '收到链接';
        return self::answer($keyword,$request);
        //$content = '收到连接';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 关注
     * @param $request
     * @return array
     */
    public static function eventSubscribe(&$request){
        $keyword = '关注首访欢迎语';
        return self::answer($keyword,$request);
        //$content = '欢迎您关注我们的微信，将为您竭诚服务';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 取消关注
     * @param $request
     * @return array
     */
    public static function eventUnsubscribe(&$request){
        $keyword = '取消关注';
        return self::answer($keyword,$request);
        //$content = '为什么不理我了？';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 扫描二维码关注（未关注时）
     * @param $request
     * @return array
     */
    public static function eventQrsceneSubscribe(&$request){
        $keyword = '扫码首访欢迎语';
        return self::answer($keyword,$request);
        //$content = '欢迎您关注我们的微信，将为您竭诚服务';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 扫描二维码（已关注时）
     * @param $request
     * @return array
     */
    public static function eventScan(&$request){
        $keyword = '扫码已关注欢迎语';
        return self::answer($keyword,$request);
        //$content = '您已经关注了哦～';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 上报地理位置
     * @param $request
     * @return array
     */
    public static function eventLocation(&$request){
        echo '收到自动上报地理位置';

        //$content = '收到上报的地理位置';
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 点击菜单拉取消息时的事件推送
     * @param $request
     * @return array
     */
    public static function eventClick(&$request){
        $keyword = $request['eventkey'];
        return self::answer($keyword,$request);
		//获取该分类的信息
        //$eventKey = $request['eventkey'];
        //$content = '收到点击菜单事件，您设置的key是' . $eventKey;
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 点击菜单跳转链接时的事件推送
     * @param $request
     * @return array
     */
    public static function eventView(&$request){
        $keyword = $request['eventkey'];
        return self::answer($keyword,$request);
        //获取该分类的信息
        //$eventKey = $request['eventkey'];
        //$content = '收到跳转链接事件，您设置的key是' . $eventKey;
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 扫码推事件的事件推送
     * @param $request
     * @return array
     */
    public static function eventScancodePush(&$request){
        $keyword = $request['eventkey'];
        return self::answer($keyword,$request);
        //获取该分类的信息
        //$eventKey = $request['eventkey'];
        //$content = '收到扫码推事件的事件，您设置的key是' . $eventKey;
        //$content .= '。扫描信息：'.$request['scancodeinfo'];
        //$content .= '。扫描类型(一般是qrcode)：'.$request['scantype'];
        //$content .= '。扫描结果(二维码对应的字符串信息)：'.$request['scanresult'];
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 扫码推事件且弹出“消息接收中”提示框的事件推送
     * @param $request
     * @return array
     */
    public static function eventScancodeWaitMsg(&$request){
        $keyword = $request['eventkey'];
        return self::answer($keyword,$request);
        //获取该分类的信息
        //$eventKey = $request['eventkey'];
        //$content = '收到扫码推事件且弹出“消息接收中”提示框的事件，您设置的key是' . $eventKey;
        //$content .= '。扫描信息：'.$request['scancodeinfo'];
        //$content .= '。扫描类型(一般是qrcode)：'.$request['scantype'];
        //$content .= '。扫描结果(二维码对应的字符串信息)：'.$request['scanresult'];
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 弹出系统拍照发图的事件推送
     * @param $request
     * @return array
     */
    public static function eventPicSysPhoto(&$request){
        $keyword = $request['eventkey'];
        return self::answer($keyword,$request);
        //获取该分类的信息
        //$eventKey = $request['eventkey'];
        //$content = '收到弹出系统拍照发图的事件，您设置的key是' . $eventKey;
        //$content .= '。发送的图片信息：'.$request['sendpicsinfo'];
        //$content .= '。发送的图片数量：'.$request['count'];
        //$content .= '。图片列表：'.$request['piclist'];
        //$content .= '。图片的MD5值，开发者若需要，可用于验证接收到图片：'.$request['picmd5sum'];
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 弹出拍照或者相册发图的事件推送
     * @param $request
     * @return array
     */
    public static function eventPicPhotoOrAlbum(&$request){
        $keyword = $request['eventkey'];
        return self::answer($keyword,$request);
        //获取该分类的信息
        //$eventKey = $request['eventkey'];
        //$content = '收到弹出拍照或者相册发图的事件，您设置的key是' . $eventKey;
        //$content .= '。发送的图片信息：'.$request['sendpicsinfo'];
        //$content .= '。发送的图片数量：'.$request['count'];
        //$content .= '。图片列表：'.$request['piclist'];
        //$content .= '。图片的MD5值，开发者若需要，可用于验证接收到图片：'.$request['picmd5sum'];
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 弹出微信相册发图器的事件推送
     * @param $request
     * @return array
     */
    public static function eventPicWeixin(&$request){
        $keyword = $request['eventkey'];
        return self::answer($keyword,$request);
        //获取该分类的信息
        //$eventKey = $request['eventkey'];
        //$content = '收到弹出微信相册发图器的事件，您设置的key是' . $eventKey;
        //$content .= '。发送的图片信息：'.$request['sendpicsinfo'];
        //$content .= '。发送的图片数量：'.$request['count'];
        //$content .= '。图片列表：'.$request['piclist'];
        //$content .= '。图片的MD5值，开发者若需要，可用于验证接收到图片：'.$request['picmd5sum'];
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 弹出地理位置选择器的事件推送
     * @param $request
     * @return array
     */
    public static function eventLocationSelect(&$request){
        $keyword = $request['eventkey'];
        return self::answer($keyword,$request);
        //获取该分类的信息
        //$eventKey = $request['eventkey'];
        //$content = '收到点击跳转事件，您设置的key是' . $eventKey;
        //$content .= '。发送的位置信息：'.$request['sendlocationinfo'];
        //$content .= '。X坐标信息：'.$request['location_x'];
        //$content .= '。Y坐标信息：'.$request['location_y'];
        //$content .= '。精度(可理解为精度或者比例尺、越精细的话 scale越高)：'.$request['scale'];
        //$content .= '。地理位置的字符串信息：'.$request['label'];
        //$content .= '。朋友圈POI的名字，可能为空：'.$request['poiname'];
        //return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * 群发接口完成后推送的结果
     *
     * 本消息有公众号群发助手的微信号“mphelper”推送的消息
     * @param $request
     */
    public static function eventMassSendJobFinish(&$request){
        //发送状态，为“send success”或“send fail”或“err(num)”。但send success时，也有可能因用户拒收公众号的消息、系统错误等原因造成少量用户接收失败。err(num)是审核失败的具体原因，可能的情况如下：err(10001), //涉嫌广告 err(20001), //涉嫌政治 err(20004), //涉嫌社会 err(20002), //涉嫌色情 err(20006), //涉嫌违法犯罪 err(20008), //涉嫌欺诈 err(20013), //涉嫌版权 err(22000), //涉嫌互推(互相宣传) err(21000), //涉嫌其他
        $status = $request['status'];
        //计划发送的总粉丝数。group_id下粉丝数；或者openid_list中的粉丝数
        $totalCount = $request['totalcount'];
        //过滤（过滤是指特定地区、性别的过滤、用户设置拒收的过滤，用户接收已超4条的过滤）后，准备发送的粉丝数，原则上，FilterCount = SentCount + ErrorCount
        $filterCount = $request['filtercount'];
        //发送成功的粉丝数
        $sentCount = $request['sentcount'];
        //发送失败的粉丝数
        $errorCount = $request['errorcount'];
        $content = '发送完成，状态是'.$status.'。计划发送总粉丝数为'.$totalCount.'。发送成功'.$sentCount.'人，发送失败'.$errorCount.'人。';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * 群发接口完成后推送的结果
     *
     * 本消息有公众号群发助手的微信号“mphelper”推送的消息
     * @param $request
     */
    public static function eventTemplateSendJobFinish(&$request){
        //发送状态，成功success，用户拒收failed:user block，其他原因发送失败failed: system failed
        $status = $request['status'];
        if($status == 'success'){
            //发送成功
        }else if($status == 'failed:user block'){
            //因为用户拒收而发送失败
        }else if($status == 'failed: system failed'){
            //其他原因发送失败
        }
        return ;
    }


    public static function test(){
        // 第三方发送消息给公众平台
        $encodingAesKey = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFG";
        $token = "pamtest";
        $timeStamp = "1409304348";
        $nonce = "xxxxxx";
        $appId = "wxb11529c136998cb6";
        $text = "<xml><ToUserName><![CDATA[oia2Tj我是中文jewbmiOUlr6X-1crbLOvLw]]></ToUserName><FromUserName><![CDATA[gh_7f083739789a]]></FromUserName><CreateTime>1407743423</CreateTime><MsgType><![CDATA[video]]></MsgType><Video><MediaId><![CDATA[eYJ1MbwPRJtOvIEabaxHs7TX2D-HV71s79GUxqdUkjm6Gs2Ed1KF3ulAOA9H1xG0]]></MediaId><Title><![CDATA[testCallBackReplyVideo]]></Title><Description><![CDATA[testCallBackReplyVideo]]></Description></Video></xml>";


        $pc = new Aes\WxBizMsgCrypt($token, $encodingAesKey, $appId);
        $encryptMsg = '';
        $errCode = $pc->encryptMsg($text, $timeStamp, $nonce, $encryptMsg);
        if ($errCode == 0) {
            print("加密后: " . $encryptMsg . "\n");
        } else {
            print($errCode . "\n");
        }

        $xml_tree = new \DOMDocument();
        $xml_tree->loadXML($encryptMsg);
        $array_e = $xml_tree->getElementsByTagName('Encrypt');
        $array_s = $xml_tree->getElementsByTagName('MsgSignature');
        $encrypt = $array_e->item(0)->nodeValue;
        $msg_sign = $array_s->item(0)->nodeValue;

        $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
        $from_xml = sprintf($format, $encrypt);

// 第三方收到公众号平台发送的消息
        $msg = '';
        $errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
        if ($errCode == 0) {
            print("解密后: " . $msg . "\n");
        } else {
            print($errCode . "\n");
        }
    }

}
