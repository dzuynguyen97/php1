<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
?>
<head>
	<title>Giới thiệu về S&N</title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="shortcut icon" href="img/logo.ico">
</head>
<body>
	<form action="#" method="post">
	
	<?php
		showSocial();
		showMenu();
	?>
	<div class="NoiDung">
		<div class="MenuDoc">
			<ul class="ListMenuDocGT">
				<li>
					<input type="submit" name="gioiThieuDetail" value="Giới thiệu">
				</li>
				<li>
					<input type="submit" name="csbm" value="Chính sách bảo mật">
				</li>
				<li>
					<input type="submit" name="csdt" value="Chính sách đổi trả">
				</li>
			</ul>
		</div>
		<?php
			if (isset($_REQUEST['gioiThieuDetail'])){
				showGT(1);
			}elseif (isset($_REQUEST['csbm'])) {
				showGT(2);
			}elseif (isset($_REQUEST['csdt'])){
				showGT(3);
			}else{
				showGT(1);
			}
		?>
	<?php
			showFooter();
		?>
		</form>
</body>
</html>