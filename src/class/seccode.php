<?php
/**
* ��֤�������
*/
class secCode {
	protected $user;
	
	public function __construct($user) {
		$this->user = $user;
	}
	
	public function sendToPhone($phone) {
		$arr = $this->user->getSafety('secCode.phone');
		
		if (time() - $arr['time'] < SECCODE_SMS_INTERVAL) {
			throw new secCodeException('��֤�뷢�͹��죬��'.(time() - $arr['time'] - SECCODE_SMS_INTERVAL).'�������');
		}
		
		$sms = new secCodeSms();
		$code = $sms->sendCode($phone);
		
		if (false !== $code) {
			$arr = ['code'=>$code, 'time'=>time(), 'errCount'=>0];
			$this->user->setSafety('secCode.phone', $arr);
			
			return true;
		} else {
			return false;
		}
	}
	
	public function checkFromPhone($code) {
		$arr = $this->user->getSafety('secCode.phone');
		
		if (empty($arr)) {
			throw new secCodeException('�����»�ȡ��֤��');
		}
		
		if (time() - $arr['time'] > SECCODE_SMS_TIME) {
			throw new secCodeException('��֤���ѹ��ڣ������»�ȡ');
		}
		
		if ($arr['code'] == $code) {
			$this->user->setSafety('secCode.phone', null);
			
			return true;
			
		} else {
			$arr['errCount'] ++;
			
			if ($arr['errCount'] >= SECCODE_SMS_MAX_ERR) {
				$this->user->setSafety('secCode.phone', null);
				throw new secCodeException('��֤����ʧЧ�������»�ȡ');
			}
				
			$this->user->setSafety('secCode.phone', $arr);
			return false;
		}
	}
}