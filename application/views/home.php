<html>
<head>
	<title>My view in ci</title>
</head>
<body>
	<div id="container">
		<p>My viewwwwwww</p>
		<?php foreach($recodes as $row):?>
	<h1><?php echo $row->title; ?></h1>
	<?php endforeach;?>
	</div>
</body>
</html>