<?php
/**
* ������֤��
* 
*/
class secCodeSms implements secCodeInterface {
	//������֤�뵽�ֻ�
	public function sendCode($phone) {
		$code = mt_rand(10000, 99999);
		
		$url = str_replace('{@phone}', urlencode($phone), SECCODE_SMS_URL);
		$url = str_replace('{@code}', urlencode($code), $url);
		
		$result = file_get_contents($url);
		
		if (false !== strpos($result, SECCODE_SMS_SUCCESS_FLAG)) {
			return $code;
		} else {
			return false;
		}
	}
}
