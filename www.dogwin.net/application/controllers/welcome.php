<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		print_r($this->shorturl('https://www.facebook.com/dogwin.net/app_464202623696627'));
	}
	function shorturl($input) {
		$base32 = array (
				'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
				'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
				'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
				'y', 'z', '0', '1', '2', '3', '4', '5'
		);
	
		$hex = md5($input);
		$hexLen = strlen($hex);
		$subHexLen = $hexLen / 8;
		$output = array();
	
		for ($i = 0; $i < $subHexLen; $i++) {
			$subHex = substr ($hex, $i * 8, 8);
			$int = 0x3FFFFFFF & (1 * ('0x'.$subHex));
			$out = '';
	
			for ($j = 0; $j < 6; $j++) {
				$val = 0x0000001F & $int;
				$out .= $base32[$val];
				$int = $int >> 5;
			}
	
			$output[] = $out;
		}
	
		return $output;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */