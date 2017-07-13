<?php 
//blocking direct access to plugin 
defined('ABSPATH') or die();

/**
 * WatchdogUserAgentService
 * 
 * Service associated with browser and OS
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 1.0.0
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @access public
 */
class WatchdogUserAgentService{
	
	//user agent information
	private $userAgent;
		
	/**
	 * Constructor
	 * Initialization
	 * @access public
	 */
	public function __construct(){
		//set user agent information
		if(isset($_SERVER["HTTP_USER_AGENT"])){
			$this->userAgent = $_SERVER["HTTP_USER_AGENT"];
		} else {
			$this->userAgent = null;
		}
	}
	
	/**
	 * Get operating system of user 
	 * 
	 * @access public
	 * @return string Operating system or unknown
	 */
	public function __getOS(){
		if(preg_match('/linux/i',$this->userAgent)){
			return 'Linux';
		} elseif(preg_match('/win/i',$this->userAgent)){
			return 'Windows';
		} elseif(preg_match('/mac/i',$this->userAgent)){
			return 'MacOS';
		} elseif(preg_match('/blackberry/i',$this->userAgent)){
			return 'BlackBerry';		
		} else {
			return 'Unknown';
		}
	}
	
	/**
	 * Get user agent string
	 * 
	 * @access public
	 * @return string User agent information
	 */
	public function __getUserAgent(){
		return $this->userAgent;
	}
}
