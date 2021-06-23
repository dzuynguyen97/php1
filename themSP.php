<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
?>
<head>
	<title>Thêm sản phẩm</title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="shortcut icon" href="img/logo.ico">
</head>
<style type="text/css">
	
	#them{

			padding: 20px;
			width: 30%; 
			/* height: 50px ; */
			font-size: 20px;
			border-radius: 15px;
			background-color: #81F7F3;
			margin-bottom: 10px
		}
</style>
<body>
	<form action="#" method="POST" enctype="multipart/form-data">
	<?php 
	    $conn=mysqli_connect('localhost','root','','btlduybeo') or die("Không thể kết nối tới cơ sở dữ liệu");
	        if($conn){
	        	mysqli_query($conn,"SET NAMES 'utf8'");
	        }else{
	            echo "Bạn đã kết nối thất bại".mysqli_connect_erro();
	        }
		$qrLoaiSP = "SELECT * FROM loai_dien_thoai";
		$acLoaiSP = mysqli_query($conn,$qrLoaiSP);
	?>
	<?php
					$maSP="";
					$tenSP="";
					$giaSP="";
					$nd1="";
					$nd2="";
					$nd3="";
					$loaiSP="";
					function checkMaSP($maSP){
						$conn=null;
						$conn=mysqli_connect('localhost','root','','btlduybeo') or die("Không thể kết nối tới cơ sở dữ liệu");
				        if($conn)
				        {
				        	mysqli_query($conn,"SET NAMES 'utf8'");
				        	$qrMaSP = "select * FROM san_pham WHERE ma_sp='$maSP'";
				        	$acMaSP=mysqli_query($conn,$qrMaSP);
				        	if (mysqli_num_rows($acMaSP)==1){
				        		return true;
				        	}
				        	else{
				        		return false;
				        	}
				        }else{
				            echo "Bạn đã kết nối thất bại".mysqli_connect_erro();
				        }
					}
					if (isset($_POST['themSP'])) {
						$maSP=$_POST['maSP'];
						$tenSP=$_POST['tenSP'];
						$giaSP=$_POST['giaSP'];
						$anh1 = "img/imgIP/".$_FILES['anh1']['name'];
						$anh2 = "img/imgIP/".$_FILES['anh2']['name'];
						$anh3 = "img/imgIP/".$_FILES['anh3']['name'];
						$nd1 = $_POST['nd1'];
						$nd2 = $_POST['nd2'];
						$nd3 = $_POST['nd3'];
						if (isset($_POST['loai'])) {
							$loaiSP = $_POST['loai'][0];
						}
						if ($loaiSP!="" && $maSP!="" && $tenSP!="" && $giaSP!="" && $anh1!="img/imgIP/" && $anh2!="img/imgIP/" && $anh3!="img/imgIP/"){
							if (checkMaSP($maSP)==true) {
							 	showPopup("Đã có mã sản phẩm này");
							}
							else{
								$insertSP = "insert into san_pham values ('$maSP','$tenSP','$loaiSP','0','$giaSP','$anh1','$anh2','$anh3','$nd1','$nd2','$nd3')";
								if (insert_db($insertSP)==true) {
									showTB("Thêm sản phẩm thành công",'themSP.php');
								}
							}
						}
						else{
							showPopup('Bạn chưa nhập đủ dữ liệu cần thiết');
						}
					}
					?>
	<div class="NoiDung" style="width: 100%;">
		<div class="contentGT" style="width: 98.5%">
			<div class="titleGT" style="line-height: 2">
				Thêm sản phẩm
			</div>
			<div class="detailGT">
				<div align="center">
					<table>
						<tr>
							<td width="190px">Mã sản phẩm:</td>
							<td><input type="text" name="maSP" value="<?php echo $maSP ?>"></td>
						</tr>
						<tr>
							<td>Tên sản phẩm:</td>
							<td><input type="text" name="tenSP" value="<?php echo $tenSP ?>"></td>
						</tr>
						<tr>
							<td>Giá sản phẩm:</td>
							<td><input type="text" name="giaSP" value="<?php echo $giaSP ?>"></td>
						</tr>
		<?php
			if (isset($_FILES["anh1"])) {
				move_uploaded_file($_FILES['anh1']['tmp_name'],"img/imgIP/".$_FILES['anh1']['name']);
			}
			if (isset($_FILES["anh2"])) {
				move_uploaded_file($_FILES['anh2']['tmp_name'],"img/imgIP/".$_FILES['anh2']['name']);
			}
			if (isset($_FILES["anh3"])) {
				move_uploaded_file($_FILES['anh3']['tmp_name'],"img/imgIP/".$_FILES['anh3']['name']);
			}
		?>
						<tr>
							<td>Ảnh sản phẩm:</td>
							<td><input type="file" name="anh1"></td>
						</tr>
						<tr>
							<td>Ảnh sản phẩm:</td>
							<td><input type="file" name="anh2"></td>
						</tr>
						<tr>
							<td>Ảnh sản phẩm:</td>
							<td><input type="file" name="anh3"></td>
						</tr>
						<tr>
							<td>Nội dung 1</td>
							<td><textarea name="nd1" cols="80" rows="8"></textarea></td>
						</tr>
						<tr>
							<td>Nội dung 2</td>
							<td><textarea name="nd2" cols="80" rows="8"></textarea></td>
						</tr>
						<tr>
							<td>Nội dung 3</td>
							<td><textarea name="nd3" cols="80" rows="8"></textarea></td>
						</tr>
					</table>
					<?php
					if (mysqli_num_rows($acLoaiSP)>0) {?>
						<table border="1">
							<caption>Thông tin loại sản phẩm</caption>
							<tr align="center">
								<td width="200px">Chọn loại sản phẩm</td>
								<td width="100px">Mã loại</td>
								<td width="100px">Seri</td>
								<td width="300px">Phiên bản</td>
								<td width="200px">Dung lượng</td>
								
							</tr>
							<?php 
							while ($row = mysqli_fetch_array($acLoaiSP)) { ?>
								<tr>
									<td align="center"><input type="radio" name="loai[]" value="<?php echo $row[0] ?>" <?php if($loaiSP == $row[0]) echo 'checked =true'?>></td>
									<td><?php echo $row[0] ?></td>
									<td><?php echo $row[1] ?></td>
									<td><?php echo $row[2] ?></td>
									<td><?php echo $row[3] ?></td>
								</tr>
							
						
					<?php
							}
					}
					// echo $_POST['a'][0];
					?>
					</table>
					<br><input type="submit" name="themSP" value="Thêm sản phẩm" id="them">
				</div>
			</div>
		</div>
	</div>
		</form>
</body>
</html>