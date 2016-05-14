<?php
/**
 * HTTP报头USERAGET部分分析
 * @author Mackee
 */
class UserAgent{
	
	public static function getAgentType(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$res['browser'] = strtolower(self::getBrowser($agent));
		$res['os'] = strtolower(self::getOS($agent));
		return $res;
	}
	
	public static function getAgentFull(){
		return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";		
	}
	
	/**
	 * 获取浏览器信息(参考app/lip/bzcat.class.php)
	 */
	public static function getBrowser($Agent) {
		$agent = $Agent;
		if (preg_match ( '/MSIE([\s|;]\d{1,2})/i', $agent, $regs )) {
			
			return "ie" . trim ( $regs [1] );
		}
		if (preg_match ( '/Firefox\/(v*)([^\s|;]+)/i', $agent, $regs )) {
			
			return "firefox";
		}
		if (preg_match ( '/Chrome\/(v*)([^\s|;]+)/i', $agent, $regs )) {
			
			return "chrome";
		}
		if (preg_match ( '/Opera\/(v*)([^\s|;]+)/i', $agent, $regs )) {
			
			return "opera";
		}
		if (preg_match ( '/Safari\/(v*)([^\s|;]+)/i', $agent, $regs )) {
			
			return "safari";
		}
		if (preg_match ( '/camino\/(v*)([^\s|;]+)/i', $agent, $regs )) {
			
			return "camino";
		}
		if (preg_match ( '/gecko\/(v*)([^\s|;]+)/i', $agent, $regs )) {
			
			return "gecko";
		}
		if (preg_match ( '/TencentTraveler\/(v*)([^\s|;]+)/i', $agent, $regs )) {
			
			return "tencenttraveler";
		}
		//匹配IE11
		//Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; ASU2JS; rv:11.0) like Gecko
		$agentLower = strtolower($agent);
		if( strpos($agentLower, 'windows') && strpos($agentLower, 'trident/7.0') && strpos($agentLower, 'rv:11') ){
			return 'ie11';
		}
		
		return null;
	}
	
	/**
	 * 获取访问用户的操作系统信息(参考app/lip/bzcat.class.php)
	 */
	public static function getOS($Agent) {
		$browserplatform = null;
		if (eregi ( 'win', $Agent ) && strpos ( $Agent, '95' )) {
			$browserplatform = "Win95";
		} elseif (eregi ( 'win 9x', $Agent ) && strpos ( $Agent, '4.90' )) {
			$browserplatform = "WinME";
		} elseif (eregi ( 'win', $Agent ) && ereg ( '98', $Agent )) {
			$browserplatform = "Win98";
		} elseif (eregi ( 'win', $Agent ) && eregi ( 'nt 5.0', $Agent )) {
			$browserplatform = "Win2000";
		} elseif (eregi ( 'win', $Agent ) && eregi ( 'nt 5.1', $Agent )) {
			$browserplatform = "WinXP";
		} elseif (eregi ( 'win', $Agent ) && eregi ( 'nt 6.0', $Agent )) {
			$browserplatform = "Vista";
		} elseif (eregi ( 'win', $Agent ) && eregi ( 'nt 6.1', $Agent )) {
			$browserplatform = "Win7";
		} elseif (eregi ( 'win', $Agent ) && (eregi ( 'nt 6.2', $Agent ) || eregi ( 'nt 6.3', $Agent ))) {
			$browserplatform = "Win8";
		} elseif (eregi ( 'win', $Agent ) && ereg ( '32', $Agent )) {
			$browserplatform = "Win32";
		} elseif (eregi ( 'win', $Agent ) && eregi ( 'nt', $Agent )) {
			$browserplatform = "WinNT";
		} elseif (eregi ( 'android', $Agent )) {
			$browserplatform = "Android";
		} elseif (eregi ( 'linux', $Agent )) {
			$browserplatform = "Linux";
		} elseif (eregi ( 'unix', $Agent )) {
			$browserplatform = "Unix";
		} elseif (eregi ( 'sun', $Agent ) && eregi ( 'os', $Agent )) {
			$browserplatform = "SunOS";
		} elseif (eregi ( 'ibm', $Agent ) && eregi ( 'os', $Agent )) {
			$browserplatform = "IBM OS/2";
		} elseif (eregi ( 'iphone', $Agent ) || eregi ( 'ipod', $Agent )) {
			$browserplatform = "IPhone";
		} elseif (eregi ( 'itouch', $Agent ) || eregi ( 'ipod', $Agent )) {
			$browserplatform = "IPhone";
		} elseif (eregi ( 'ipad', $Agent )) {
			$browserplatform = "IPad";
		} elseif (eregi ( 'Mac', $Agent ) && eregi ( 'PC', $Agent )) {
			$browserplatform = "Macintosh";
		} elseif (eregi ( 'PowerPC', $Agent )) {
			$browserplatform = "PowerPC";
		} elseif (eregi ( 'AIX', $Agent )) {
			$browserplatform = "AIX";
		} elseif (eregi ( 'HPUX', $Agent )) {
			$browserplatform = "HPUX";
		} elseif (eregi ( 'NetBSD', $Agent )) {
			$browserplatform = "NetBSD";
		} elseif (eregi ( 'BSD', $Agent )) {
			$browserplatform = "BSD";
		} elseif (ereg ( 'OSF1', $Agent )) {
			$browserplatform = "OSF1";
		} elseif (ereg ( 'IRIX', $Agent )) {
			$browserplatform = "IRIX";
		} elseif (eregi ( 'FreeBSD', $Agent )) {
			$browserplatform = "FreeBSD";
		} 
		
		if ( !$browserplatform ) {
			$browserplatform = "Unknown";
		}
		return $browserplatform;
	}
}
