<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Chomsky Sentence Generator</title>
	<link rel="icon" type="image/png" href="<?= base_url(); ?>images/ChomskyIcon.png"></link>
	<link rel="stylesheet" href="<?= base_url(); ?>css/ChomskyGenerator.css"></link>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?= base_url() ?>js/chomsky.js"></script>
	
</head>
<body>

<div id="title">
	<h1>THE CHOMSKY SENTENCE GENERATOR</h1>
</div>

<div id="intro">
	This website generates random sentences based on the sentence coined by Noam Chomsky, 
	<i>"Colourless green ideas sleep furiously"</i>, to show that a sentence can be syntactically 
	sound without being semantically sound. These sentences are completely understandable in the 
	sense that we are able to imagine what they <i>should</i> mean. However, at the same time, 
	we cannot understand them because the words do not make sense with respect to one another. 
</div>

<div id="container">
	<div id="internal">

		Click here to generate a new Chomsky sentence:
		<div>
		<button type="button" onclick="generateSentence()">Generate</button>
		</div>

		<div id="chomsky">

			<?php 


				// $command = "/Users/magali/workspace/python/ChomskySatzGenerator.py 2>&1";
				// $pid = popen( $command,"r");
				// echo "<h2>";
				// while( !feof( $pid ) )
				// {
				//  	echo fread($pid, 256);
				//  	flush();
				//  	ob_flush();
				//  	usleep(100000);
				// }
				// pclose($pid);
				// echo "</h2>";


				// $command = escapeshellcmd('/Users/magali/workspace/python/ChomskySatzGenerator.py');
				// $output = shell_exec($command);
				// echo $output;




				// exec("python /Users/magali/workspace/python/ChomskySatzGenerator.py 2>&1", $output);
				// var_dump($output);
			?>

		</div>


	</div>

	<p class="footer"></p>
</div>

</body>
</html>