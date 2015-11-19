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
	<?php if(isset($records)) : foreach($records as $row) : ?>
    	
    	<h2><?php echo anchor("site/delete/$row->id", $row->title); ?></h2>
    	<div><?php echo $row->contents; ?></div>
    <?php endforeach;?>
    <?php else :?>
    <h2>No records were returned.</h2>
	<?php endif;?>

	<hr />

	<h2>Delete</h2>

	<p>To sample the delete method, simply click on one of the
		headings listed above. A Delete query will automatically run.</p>


</body>
</html>