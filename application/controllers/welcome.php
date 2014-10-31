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

		$this->load->view('welcome_message');

	}


	public function googletest($id) {

		//access through http://localhost/~magali/webtest/index.php/welcome/googletest/three

		// or use BING API http://stackoverflow.com/questions/4231663/google-search-api-number-of-results
		// option 1
		$query=$id;
		$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=$query";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$body = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($body);

		print $json->responseData->cursor->estimatedResultCount;

		echo '\n';

		// // option 2
		// function getRP($q) {
		// 	$result = file_get_contents("http://www.google.com/search?as_q=" . $q . "&hl=en&ie=UTF-8&btnG=Google+Search&as_epq=&as_oq=&as_eq=&lr=&as_ft=i&as_filetype=&as_qdr=all&as_nlo=&as_nhi=&as_occt=any&as_dt=i&as_sitesearch=&safe=images");

		// 	return $result;
		// }

		// function get_string_between($string, $start, $end){
		// 	$string = " ".$string;
		// 	$ini = strpos($string,$start);
			
		// 	if ($ini == 0) {
		// 		return "";
		// 	}
			
		// 	$ini += strlen($start);
		// 	$len = strpos($string,$end,$ini) - $ini;
			
		// 	return substr($string,$ini,$len);
		// }

		// function parse_results($result) {
		// 	$temp = get_string_between($result, "<div id=resultStats>", "<nobr>");
		// 	$temp = get_string_between($temp, "About ", " results");
		// 	$temp = str_replace(",", "", $temp);
			
		// 	return $temp;
		// }

		// $q = "Google";
		// echo parse_results(getRP($q));
		// echo '\n';


		// // option 3
		$params = array('q' => $query);
		$content = file_get_contents('http://www.google.com/search?' . http_build_query($params));
		preg_match('/About (.*) results/i', $content, $matches);
		echo !empty($matches[1]) ? $matches[1] : 0;

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */