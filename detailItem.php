<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
?>
<head>
	<?php
	
	$img="";
	$query='SELECT * FROM `san_pham` WHERE ma_sp="'.$_SESSION['detailItem'].'"';
	$db=getDB($query);
	$tenSP=$giaSP=$noiDung=$hinh1=$hinh2=$hinh3=$nd1=$nd2=$nd3="";
	if ($db!=false) {
	    while ($row=mysqli_fetch_array($db)) {
	    	$maSP=$row[0];
	        $tenSP=$row[1];
	        $giaSP=$row[4];
	        $hinh1=$row[5];
	        $hinh2=$row[6];
	        $hinh3=$row[7];
	        $nd1=$row[8];
	        $nd2=$row[9];
	        $nd3=$row[10];
	        // $nDung=$row[8]."<br>".$row[9]."<br>".$row[10]."<br>";
	        
	    }
	}
?>
	<title>
		Chi tiết sản phẩm 
		<?php
			echo $tenSP;
		?>
	</title>
	<link rel="shortcut icon" href="img/logo.ico">
</head>
<link rel="stylesheet" type="text/css" href="layout.css">
<style type="text/css">
		.content{
			width: 80%;			
			margin: 20px auto;
			height: auto;
		}
		.content .ImageItem{
			width: 30%;
			height: 500px;
			
			float: left;
			border: 5px solid black;
			border-radius: 25px;
			padding: 10px;
		}
		.content .DetailItem{
			width: 65%;
			height: 500px;
			float: right;
			font-size: 20px;
			text-align: justify;
		}
		.content .DetailItem > div{
			margin-bottom: 10px;
		}
		.titleNameItem{
			font-family: Quicksand;
			font-size: 45px;
			color: black;
			font-weight: solid;
			margin-bottom: 10px;
		}
		.Gia{
			width: 80%;
			border: 3px solid black;
			padding: 10px;
			background-image: linear-gradient(140deg, #EADEDB 0%, #BC70A4 50%, #BFD641 75%);
			background: url("img/bgGia.gif") no-repeat scroll 86% 12% rgba(0,0,0,0);
		}
		.CauHinhSP{
			text-indent: 30px;
			line-height: 1.8;
		}
		.divAddItem{
			width: 100%;
			height: 100px;

		}
		.divAddItem > input{
			margin: 0px auto;
			display: block;
			width: 80%;
			height: 80px;
			font-family: Quicksand;
			color: black;
			font-size: 20px;
			background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));
			border-radius: 15px;
		}
		.divAddItem > input:hover{
			background-color: orange;
		}

	</style>

	
<script type="text/javascript">
	
</script>
<?php
	
	function checkGH($id){
		$conn=mysqli_connect('localhost','root','','btlduybeo') or die("Không thể kết nối tới cơ sở dữ liệu");
        if($conn)
        {
        	mysqli_query($conn,"SET NAMES 'utf8'");
        	$query = "select * FROM gio_hang WHERE ma_sp='$id'";
        	$data=mysqli_query($conn,$query);
        	if (mysqli_num_rows($data)==1){
        		$dt=mysqli_fetch_array($data);
        		return $dt[2];
        	}
        	else{
        		return -1;
        	}
        }else{
            echo "Bạn đã kết nối thất bại".mysqli_connect_erro();
        }
	}
	if (isset($_REQUEST['addSP'])){
		if (isset($_SESSION['name'])){
			$sl=checkGH($maSP);
			if ($sl>0){
				$sl++;
				$query="UPDATE `gio_hang` SET `so_luong`=$sl WHERE ma_sp='$maSP' and user='$user'";
				if (insert_db($query)==true) showPopup("Thêm thành công!");
			}
			else{
				$query="INSERT INTO `gio_hang` (`ma_sp`, `user`, `so_luong`, `giasp`) VALUES ('$maSP', '$user', '1',$giaSP);";
				if (insert_db($query)==true) showPopup("Thêm mới thành công!");
			}
		}
		else{
			header("location: login.php");
		}
		if (isset($_POST['xoadbSP'])) {
		$qrXoaSP="delete from san_pham WHERE ma_sp='$maSP'";
		if (insert_db($qrXoaSP)==true) {
			showTB('Xoá sản phẩm thành công','index.php');
			;
		}
	}
	}
?>
<body onload="changeImgItem()">
	<form action="#" method="post">
	<?php
		showSocial();
		showMenu();
	?>
		<div class="content">
			<div class="ImageItem">
				<div id="imgItem">
					<img src="<?php echo $hinh1?>" style="width: 100%;height: 500px; margin-bottom: 10px;">	
				</div>
				<div style="margin-top: 20px;text-align: center;">Hình ảnh sản phẩm</div>
				<div style="min-height: 20px"></div>
				<div class="divAddItem">
					<input type="submit" name="addSP" value="Thêm vào giỏ hàng">
					<?php
						if (isset($_SESSION['quyen'])){
							if ($_SESSION['quyen']==2) {
								?>
								<input type="submit" name="xoadbSP" value="Xoá sản phẩm" onclick="return confirm('Bạn có chắc muốn xoá không?')">
								<?php
							}
						}
					?>
					
				</div>
			</div>
			<div class="DetailItem">
				<div class="titleNameItem">
					<?php echo $tenSP ?>
				</div>
				<div class="Gia">
					Giá: <font style="font-size: 45px;color: red;font:600 55px Helvetica;margin-left: 30px" id="gia"><?php echo $giaSP ?> <u>đ</u></font>
				</div>
				<div class="CauHinhSP">
					<div>
						<?php
							echo $nd1;
						?>
					</div>
					<div>
						<center>
						<img width="500px" src="
						<?php
							echo $hinh2;
						?>">	
						</center>
					</div>
					<div>
						<?php
							echo $nd2;
						?>
					</div>
					<div>
						<center>
						<img width="500px" src="
						<?php
							echo $hinh3;
						?>">	
						</center>
					</div>
					<div>
						<?php
							echo $nd3;
						?>
					</div>
				</div>
			</div>
		</div>
	</form>
	
</body>
</html>