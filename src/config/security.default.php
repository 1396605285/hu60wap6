<?php
/**
* ��ȫ������
*/


/**
* �����û������õ�Key
* 
* ע�⣺��Key��������վû���κ��û�ʱ���ġ�����һ�����ģ������û������붼��ʧЧ��
*/
define('USER_PASS_KEY', 'USER_PASS_KEY');
  
/**
* �Ƿ����ö�����֤��
*/
define('SECCODE_SMS_ENABLE', false);

/**
* ������֤��URL
* 
* �����滻�����ݣ�
*	{@phone}	�ֻ�����
*	{@code}	�����͵���֤��
*/
define('SECCODE_SMS_URL', 'http://hu60.cn/sms?key=hu60&phone={@phone}&code={@code}');

/**
* ������֤�뷢�ͳɹ���־
* 
* ������Ϊ���ͳɹ�ʱURL�᷵�ص�����
*/
define('SECCODE_SMS_SUCCESS_FLAG', 'success');

/**
* ������֤��ļ�����룩
*/
define('SECCODE_SMS_INTERVAL', 30);

/**
* ��֤����Ч�ڣ��룩
*/
define('SECCODE_SMS_TIME', 300);

/**
* ��֤������������
*/
define('SECCODE_SMS_MAX_ERR', 5);
