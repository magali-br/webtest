<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Chomsky Sentence Generator</title>
	<link rel="icon" type="image/png" href="chomskyicon.png" />
	<!-- <link rel="shortcut icon" href="<?= base_url() ?>SpaceInvaders.ico"> -->
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #1EBCA5;
		margin: 40px;
		font: 18px/20px "Palatino Linotype", "Book Antiqua", Palatino, serif;
		font: 18px/20px "Zapf-Chancery", cursive;
		color: #153F39;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #153F39;
		background-color: transparent;
		border-bottom: 1px solid #147365;
		font-size: 50px;
		font-weight: bold;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
		text-align: center;
		font-variant: small-caps;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #147365;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	button {
	  	color: #153F39;

	}

	#generatebutton {
	  	color: #153F39;
	  	font-size: 150%;

		font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
      	background-color: #1EBCA5;
	  	-moz-border-radius: 15px;
	  	-webkit-border-radius: 15px;
	  	border: 1px solid #153F39;
	  	padding: 5px;
	  	border-style: dotted;
	}

	#generatebutton:hover {opacity: 0.6; }

	#body{
		margin: 0 15px 0 15px;
		padding: 20px 10px 20px 10px;
	}

	#chomsky {
		font-style: oblique;
		padding: 20px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #147365;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #147365;
		-webkit-box-shadow: 0 0 8px #147365;
	}
	</style>


	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>

	function generateSentence() {

		$("#chomsky").html("Sentence being generated...");

		// Start twirly thing to make person be patient...

		$.get("http://localhost/~magali/webtest/index.php/chomsky/generate", function(data) {
			$("#chomsky").html(data);
			// stop twirly Thing
		});

		// $.get("/Users/magali/workspace/python/ChomskySatzGenerator.py", function(data) {
		// 	$("#chomsky").html(data);
		// 	// stop twirly Thing
		// });



	}

	</script>

	
</head>
<body>

<div id="title">
	<h1>THE CHOMSKY SENTENCE GENERATOR</h1>
</div>

<div id="container">
	<div id="body">

		Click here to generate Chomsky sentence:
		<button type="button" onclick="generateSentence()">Generate</button>

		<div id="chomsky">

			<?php 

				// echo "<img type='image/png' src='chomskyicon.png'/>";
				// echo "/images/chomskyicon.png/>"


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