<?php
namespace ZhiCaiWX;
/**
 * 系统主配置文件.
 * @Created by David Fang.
 * @Author: David Fang
 * @Mail
 * @Date: 14-8-1
 * @Time: 下午1:00
 */


/*
 * 服务器配置，详情请参考@link http://mp.weixin.qq.com/wiki/index.php?title=接入指南
 */
define("WECHAT_URL", 'http://www.abc.com');
define('WECHAT_TOKEN', 'weixin');
define('ENCODING_AES_KEY', "MqAuKoex6FyT5Nosdfsdew0OcpRyCicThGs0P1vz4mJ2gwvvkF");

/*
 * 开发者配置
 */
define("WECHAT_APPID", 'wx5d57f64bbsdfsf4804d90');
define("WECHAT_APPSECRET", '4b1fa6d94423wgeer51ec9268eff05e38f521');


////-----引入系统所需类库-------------------
////引入错误消息类
//include_once 'core/msg.lib.php';
////引入错误码类
//include_once 'core/msgconstant.lib.php';
////引入CURL类
//include_once 'core/curl.lib.php';
//
////-----------引入微信所需的基本类库----------------
////引入微信处理中心类
//include_once 'core/wechat.lib.php';
////引入微信请求处理类
//include_once 'core/wechatrequest.lib.php';
////引入微信被动响应处理类
//include_once 'core/responsepassive.lib.php';
////引入微信access_token类
//include 'core/accesstoken.lib.php';
//
////-----如果是认证服务号，需要引入以下类--------------
////引入微信权限管理类
//include_once 'core/wechatoauth.lib.php';
////引入微信用户/用户组管理类
//include_once 'core/usermanage.lib.php';
////引入微信主动相应处理类
//include_once 'core/responseinitiative.lib.php';
////引入多媒体管理类
//include_once 'core/media.lib.php';
////引入自定义菜单类
//include_once 'core/menu.lib.php';
?>