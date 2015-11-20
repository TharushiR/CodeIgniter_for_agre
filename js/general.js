$(document).ready(function(){
	$('#content').load('index1.php');

	//handle menu clicks
	$('ul#nav li a').click(function(){
		var page = $(this).attr('href');
		$('#content').load(page + '.php');
		return false;
	});

});

