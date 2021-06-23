<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
?>
<head>
	<title>Quản lý quản trị</title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="shortcut icon" href="img/logo.ico">
</head>
<style type="text/css">
	/*.NoiDung{
		width: 80%;
		margin: 10px auto;
		height: auto;
		font-size: 20px;
		text-indent: 25px;
	}*/
	
	.tbThem tr td{
		border: 1px solid;
		padding: 2px;
		border-radius: 10px;
		width: 200px;
	}
	.NoiDung div tr td{
		border: 1px solid;
		/*padding: 5px;*/
		/*border-radius: 10px;*/
		width: 200px;
	}
	.NoiDung div tr td input{
		height: 20px;
		width: 200px;
		
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
</style>
<body>
	<form action="#" method="post">
	<div class="NoiDung" style="width: 100%">
		<div class="contentGT" style="width: 100%">
			<div class="titleGT" style="line-height: 2">
				Tài khoản Quản Trị Viên
			</div>
			<div class="detailGT">
			<?php
				$xoa="";
				$userQTV="";
				$passQTV="";
				$nameQTV="";
				function checkUser($us){
						$conn=null;
						$conn=mysqli_connect('localhost','root','','btlduybeo') or die("Không thể kết nối tới cơ sở dữ liệu");
				        if($conn)
				        {
				        	mysqli_query($conn,"SET NAMES 'utf8'");
				        	$qrUser = "select * FROM info WHERE user='$us'";
				        	$acUser=mysqli_query($conn,$qrUser);
				        	if (mysqli_num_rows($acUser)==1){
				        		return true;
				        	}
				        	else{
				        		return false;
				        	}
				        }else{
				            echo "Bạn đã kết nối thất bại".mysqli_connect_erro();
				        }
					}
				if (isset($_POST['themTK'])) {
					$userQTV=$_POST['userQTV'];
					$passQTV=$_POST['passQTV'];
					$nameQTV=$_POST['nameQTV'];
					if ($userQTV!="") {
						if ($passQTV!="") {
							if (checkUser($userQTV)==false) {
								$insertInfo = "insert into info values ('$userQTV','$passQTV',N'$nameQTV',2)";
								if (insert_db($insertInfo)==true) {
										showTB("Thêm tài khoản thành công",'quanLyQTV.php');
								}
							}
							else
								showPopup("Đã có User này");
						}else
						showPopup("Bạn chưa điền Password");
					}else
					showPopup("Bạn chưa điển User");
				}
			?>
			<table width="45%" style="display: block; float: left;" class="tbThem">
				<tr >
					<td style="background-color: #F5BCA9;">User</td>
					<td >
						<input type="text" name="userQTV" value="<?php echo $userQTV;?>">
					</td>
				</tr>
				<tr>
					<td style="background-color: #F5BCA9">Password</td>
					<td>
						<input type="text" name="passQTV" value="<?php echo $passQTV ?>">
					</td>
				</tr>
				<tr>
					<td style="background-color: #F5BCA9" >Họ tên</td>
					<td>
						<input type="text" name="nameQTV" value="<?php echo $nameQTV ?>">
					</td>
				</tr>
				<tr>
					<td colspan="2" style="border: none; border-radius: 0px" align="center"><input type="submit" name="themTK" value="Thêm tài khoản" id="them" style="width: 80%; height: 100%"></td>
				</tr>
			<?php
				if (isset($_POST['xoaTK'])) {

					$xoa=$_POST['xoaTK'];
					$delTK="delete from info where user='$xoa'";
					if (insert_db($delTK)) {
						showTB("Xoá thành công","quanLyQTV.php");
					}
				}
			?>
			</table>
			<table width="53%" style="display: flex;">
				<tr>
					<td>User</td>
					<td>Password</td>
					<td>Họ tên</td>
					<td>Xoá tài khoản</td>
				</tr>
				<?php
				$data=getDB("select * from info where ho_ten != 'admin' and phan_quyen=2");
			    while ($data1=mysqli_fetch_array($data)){
			    	?>
			    	<tr>
			    		<td><?php echo $data1[0] ?></td>
			    		<td><?php echo $data1[1] ?></td>
			    		<td><?php echo $data1[2] ?></td>
			    		<td><button style="width: 100%;height: 100%; border: none; background-color: silver" type="submit" name="xoaTK" value="<?php echo $data1[0] ?>">Xoá</button></td>
			    	</tr>
			    <?php 
				} 
			?>
			</table>

			<br>
			<div align="center" style=>
				
			</div>
			<br>

		</div>
	</div>
</div>
	</form>
</body>
</html>