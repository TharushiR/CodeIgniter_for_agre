<html lang="en">
<head>
	<title>Ud</title>
</head>
<style type="text/css">
	label{
		display: block;
	}
</style>
<body>
	<h2>Add data into database</h2>
	<?php echo form_open('site/create');?>

	<p>
		<label for="title">Title:</label>
		<input type="text" name="title" id="title" />
	</p>
	<p>
		<label for="contents">Content:</label>
		<input type="text" name="contents" id="contents" />
	</p>
	<p>
		<input type="submit"  value="submit">
	</p>

	<?php echo form_close();?>

	<hr />

	<h2>Read from database</h2>

</body>
</html>