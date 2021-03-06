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
	 *
	 *TODO
	 *-add a twirly thing to show loading
	 *- make an API and document it (see below)
	 *- make python return JSON: each part of speech, including "article": "", then "sentence": "..."
	 *- adapt my view to use the API
	 *-add words to database so that sentence generation doesn't take so long
	 *------use ids to generate random number; or number on top of file saving all nouns & adjectives
	 *- remove proper names from noun
	 */
	public function index()
	{

		$this->load->view('welcome_message');
	}

	public function generatesentence() {
		$this->generate('sentence');
	}

	public function generatejson() {
		$this->generate('json');
	}

	function generate($argument) {
		$command = "python/ChomskySatzGenerator.py $argument 2>&1";
		$pid = popen( $command,"r");
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
