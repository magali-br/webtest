
function generateSentence() {

	// Start twirly thing to make person be patient...

	var pathArray = window.location.pathname.split( '/' );
	var pathname = window.location.protocol + "//" + window.location.host;
	for (i = 0; i < pathArray.length - 1; i++) {
		if (pathArray[i].length > 0) {
	  		pathname += "/";
	  		pathname += pathArray[i];
	  	}
	}
	pathname += "/generatesentence";

	$("#chomsky").html("Sentence being generated...");


	// Pathname on my computer should be 
	// 		http://localhost/~magali/webtest/index.php/chomsky/generate
	// window.location.pathname is http://localhost/~magali/webtest/index.php/chomsky/generator

	$.get(pathname, function(data) {
		$("#chomsky").html(	"<h2>" + data + "</h2>");
		// Stop twirly thing
	});

	// $.get("/Users/magali/workspace/python/ChomskySatzGenerator.py", function(data) {
	// 	$("#chomsky").html(data);
	// 	// stop twirly Thing
	// });



}