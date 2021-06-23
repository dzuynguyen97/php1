<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
?>
<head>
	<title>Giỏ hàng</title>
</head>
<link rel="stylesheet" type="text/css" href="layout.css">
<link rel="shortcut icon" href="img/logo.ico">
<style type="text/css">
		.NoiDung{
			width: 80%;
			margin: 10px auto;
			height: auto;
			font-size: 20px;
			text-indent: 25px;
		}
		
		.NoiDung div tr td{
			border: 1px solid;
			padding: 5px;
			border-radius: 10px;
			width: 200px;


		}
		.NoiDung div tr td input{
			height: 20px;
			width: 200px;
			
		}
		.div1{
			border-radius: 10px;
			width: 30%;
			float: left;
			height: 250px;
			
		}
		.div2{
			border-radius: 10px;
			width: 50%;
			float: right;
			height: auto;
			
		}
		#confirm{
			padding: 20px;
			width: 100%; 
			/* height: 50px ; */
			font-size: 20px;
			border-radius: 15px;
			background-color: #81F7F3;
		}
		#confirm:hover{
			background-color: orange;
		}
	</style>
<body>
	<form action="#" method="post">
		
	<?php
		showSocial();
		showMenu();
		if (isset($_SESSION['user'])){

		}else{
			header("location: login.php");
		}
	?>
	<div id="banner" style="width: 80%; margin: 0 auto">
		<img src="img/banner1.jpg" style="width: 100%; border-radius: 5px" >
	</div>
	<div class="NoiDung">
		<div class="div1" style="border: 1px solid">
			<table  class="class1">
				<tr >
					<td  style="background-color: #F5BCA9;">Họ tên</td>
					<td>
						<input type="text" name="hoten" value="<?php echo $_SESSION['name'];?>" id="hoTenKhachHang">
					</td>
				</tr>
				<tr>
					<td style="background-color: #F5BCA9">SĐT</td>
					<td>
						<input type="text" name="sdt" placeholder="Nhập số điện thoại" id="sdt">
					</td>
				</tr>
				<tr>
					<td style="background-color: #F5BCA9" >Địa chỉ</td>
					<td>
						<input type="text" name="diachi" placeholder="Nhập địa chỉ giao hàng" id="diaChiGiaoHang">
					</td>
				</tr>
			</table>
			<br>
			<input type="submit" name="xacnhan" value="Xác nhận đặt hàng" id="confirm">
			<br>
			<div>
				<center>
				<?php
					// echo $reportGH;
				?>	
				</center>
				
			</div>
		</div>
		<?php
			showGioHang();
		?>
	</div>
	<?php
			showFooter();
	?>
	</form>
</body>
</html>