<?php
namespace ZhiCaiWX\core;
use ZhiCaiWX\models\ErrorLog;
/**
 *
 * 错误提示类
 *
 * Class Msg
 * Created by David Fang.
 * @Author:  David Fang.
 * @
 * @Date: 14-1-10
 * @Time: 下午4:22
 * 
 * 
 */
class Msg {
	/**
	 * 返回错误信息 ...
	 * @param int $code 错误码
	 * @param string $errorMsg 错误信息
	 * @return Ambigous <multitype:unknown , multitype:, boolean>
	 */
	public static function returnErrMsg($code,  $errorMsg = null) {
		$returnMsg = array('error_code' => $code);
		if (!empty($errorMsg)) {
			$returnMsg['custom_msg'] = $errorMsg;
		}
        $returnMsg['custom_msg'] = '出错啦！'.$returnMsg['custom_msg'];
        exit($returnMsg['custom_msg']);
	}

    /**
     * 当向微信请求信息出错时保存出错信息
     * @param $errcode 此处是微信返回的errcode
     * @param $errmsg 此处是微信返回的errmsg
     * @param $file 调用请求的文件名
     * @param $line (可能)调用请求所在的行
     * @param $line_code (可能)调用请求行的代码，转换关键变量
     */
    public static function saveWeixinErrMsg($errcode,$errmsg,$file,$line,$line_code){
        $_model_error_log = new ErrorLog();
        $_model_error_log->errcode = $errcode;
        $_model_error_log->errmsg = $errmsg;
        $_model_error_log->file = $file.'('.$line.'行)';
        $_model_error_log->line_code = $line_code;
        $_model_error_log->save();
    }
}
?>
