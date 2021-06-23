<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
?>
<head>
	<title>Quản lý</title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="shortcut icon" href="img/logo.ico">
</head>
<style type="text/css">
	a{
		text-decoration: none;
	}
	a:visited, a:link{
		color: black;

	}
	#them{

			padding: 20px;
			width: 30%; 
			/* height: 50px ; */
			font-size: 20px;
			border-radius: 15px;
			background-color: #81F7F3;
			margin-bottom: 10px
		}
	.ListMenuDocGT{
			margin: 0px;
			padding: 0px;
			width: 23%;
			height: auto;
			float:left;
		}
		.ListMenuDocGT li:hover{
			background-color: orange;
		}

		.ListMenuDocGT li{
			list-style: none;
			border:1px inset black;
			background-color: lightblue;
		}

		.ListMenuDocGT li input{
			display: block;
			text-decoration: none;
			line-height: 80px;
			width: 100%;
			height: 70px;
			background-color: lightblue;
			border: none;
		}
		.ListMenuDocGT li a{
			display: block;
			text-decoration: none;
			line-height: 80px;
			width: 100%;
			height: 70px;
			background-color: lightblue;
			border: none;
		}

		.ListMenuDocGT li input:hover{
			background-color: orange;
		}

		.contentGT{
			float: left;
			width: 75%;
			margin-left: 10px;
			min-height: 400px;
			/*background-color: red;*/
		}
		.titleGT{
			width: 100%;
			min-height: 50px;
			background-color: green;
			font-weight: bold;
			text-align: center;

		}
		.detailGT{
			width: 100%;
			min-height: 350px;
			background-color: tan;
		}
</style>
<body>
	<form action="#" method="post" enctype="multipart/form-data">
	
	<?php
		showSocial();
		showMenu();
		$_SESSION['flagTSP']= false;
		$_SESSION['flagQLDH']= false;
		$flag= false;
	?>
	<div class="NoiDung">
		<div class="MenuDoc">
			<ul class="ListMenuDocGT">
				
				<li>
					<a href="themSP.php" target="right">Thêm sản phẩm</a>
				</li>
				<li>
					<a href="quanlyDH.php" target="right">Quản lý đơn hàng</a>
				</li>
				<?php
					if ($_SESSION['name']=='admin') {
						echo'<li>
							<a href="quanlyQTV.php" target="right">Quản lý QTV</a>
						</li>';
					}
				?>
			</ul>
		</div>
	</div>
	<div class="NoiDung">
			<div class="contentGT" style="margin-top: 0px">
				<iframe name="right" width="100%" height="1000px" style="border: none; float: left;"></iframe>
			</div>
		
	</div>
	
	<?php
			showFooter();
		?>
		</form>
</body>
</html>
