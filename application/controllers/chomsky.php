<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chomsky extends CI_Controller {

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

		$this->load->view('welcome_message');
	}

	public function generate() {
				$command = "/Users/magali/workspace/python/ChomskySatzGenerator.py 2>&1";
				$pid = popen( $command,"r");
				echo "<h2>";
				while( !feof( $pid ) )
				{
				 	echo fread($pid, 256);
				 	flush();
				 	#ob_flush();
				 	usleep(100000);
				}
				pclose($pid);
				echo "</h2>";
	}

	public function generator() {
		$this->load->view('generator');
	}

}
