<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
?>
<link rel="stylesheet" type="text/css" href="layout.css">
<style type="text/css">
	.Search{
			width: 80%;
			margin: 10px auto;
		}
		.ElementSearch{
			width: 100%;
			/*background-color: red;*/
			/*margin: 100px auto;*/
		}
		.ElementSearch form{
			width: 50%;
			margin: 0px auto;
		}
</style>
<head>
	<title></title>
</head>
<body>
	<form method="get" action="#">
		<?php
			showSearch();
		?>	
	</form>
	
</body>
</html>