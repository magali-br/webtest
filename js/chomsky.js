
function generateSentence() {

	$("#chomsky").html("Sentence being generated...");

	// Start twirly thing to make person be patient...

	$.get("http://localhost/~magali/webtest/index.php/chomsky/generate", function(data) {
		$("#chomsky").html(data);
		// Stop twirly thing
	});

	// $.get("/Users/magali/workspace/python/ChomskySatzGenerator.py", function(data) {
	// 	$("#chomsky").html(data);
	// 	// stop twirly Thing
	// });



}