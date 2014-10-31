<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title>Chomsky Sentence Generator</title>
<!-- 
<link rel="stylesheet" href="<?= base_url(); ?>css/template.css"></link>  -->


</head>

<body>
<div>
<h1> Welcome to the Chomsky Sentence Generator </h1>
<?php
		$command = "/Users/magali/workspace/python/ChomskySatzGenerator.py 2>&1";
		$pid = popen( $command,"r");
		echo "<h1>";
		while( !feof( $pid ) )
		{
		 	echo fread($pid, 256);
		 	flush();
		 	ob_flush();
		 	usleep(100000);
		}
		pclose($pid);
		echo "</h1>";

				// $command = escapeshellcmd('/Users/magali/workspace/python/ChomskySatzGenerator.py');
		// $output = shell_exec($command);
		// echo $output;




		// exec("python /Users/magali/workspace/python/ChomskySatzGenerator.py 2>&1", $output);
		// var_dump($output);

?>
</div>


</body>
</html> 