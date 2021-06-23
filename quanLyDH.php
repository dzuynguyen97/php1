<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
?>
<head>
	<title>Quản lý đơn hàng</title>
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
</style>
<body>
	<form action="#" method="POST" enctype="multipart/form-data">
	<?php 
		$tongTien="";
		$detail="";
		$DaBan="";
		if (isset($_REQUEST['detail'])){
			$detail=$_REQUEST['detail'];
		}
	?>
	<div class="NoiDung" style="width: 100%">
		<div class="contentGT" style="width: 100%">
		<div class="titleGT" style="line-height: 2">
				Quản lý đơn hàng
			</div>
		<div class="detailGT">
		<div class="content" style="width: 100%">
    	<table border="2" style="width: 100%;text-align: center;font-size: 20px" >
    		<tr>
    			<th>Mã đơn</th>
    			<th>Tên khách</th>
    			<th>Địa chỉ</th>
    			<th>Số điện thoại</th>
    			<th>Ngày đặt hàng</th>
    			<th>Tổng tiền hóa đơn</th>
    			<th>Chi tiết</th>
    			<th>Đã bán</th>
    		</tr>
    		<?php
				$data=getDB("select * from hoa_don");
			    while ($data1=mysqli_fetch_array($data)){
			    	?>
			    	<tr>
			    		<td width="10%"><?php echo $data1[0]?></td>
			    		<td width="10%"><?php echo $data1[1]?></td>
				    	<td width="10%"><?php echo $data1[2]?></td>
				    	<td width="10%"><?php echo $data1[3]?></td>
				    	<td width="20%"><?php echo $data1[4]?></td>
				    	<td width="20%"><?php echo $data1[5]?></td>
				    	<td width="10%"><a href="?detail=<?php echo $data1[0]?>" >Chi tiết</a></td>
				    	<td width="10%"><input type="checkbox" name="DaBan[]" value="<?php echo $data1[0] ?>" <?php if ($data1[6]==1) {
				    		echo("checked");} ?> >
				    		<!-- <input type="submit" name="boCheck" value="Huỷ đã bán" style="border: none; background-color: silver"> -->
				    	</td>
			    	</tr>
			    	<?php  	
			    }
    		?>
    		<?php
    		$data2=getDB("select * from hoa_don");
    			if (isset($_POST['xacnhanDaBan'])) {
    				echo $_POST['DaBan'][0];
					$DaBan = $_POST['DaBan'];
    				while ($data3=mysqli_fetch_array($data2)){
    					if (in_array($data3[0], $DaBan)) {
			    			$updateDH = "UPDATE hoa_don SET da_giao=1 WHERE ma_hd='$data3[0]'";
			    			insert_db($updateDH);
    					}
    					else{
    						$updateDH = "UPDATE hoa_don SET da_giao=0 WHERE ma_hd='$data3[0]'";
			    			insert_db($updateDH);
    					}
				    }
				    header("location: quanLyDH.php");
				}
    		?>
    	</table>
    </div>
    <div style="min-height: 200px" align="center">
    	<input type="submit" name="xacnhanDaBan" value="Xác nhận" id="them" style="margin-top: 30px">
    </div>
    <div class="content" style="margin-bottom: 100px">
		<div class="content" style="width: 100%">
    	<table border="2" style="width: 100%;text-align: center;font-size: 20px" >
    		<tr>
    			<th>Sản phẩm</th>
    			<th>Giá sản phẩm</th>
    			<th>Số lượng</th>
    			<th>Thành tiền</th>
    		</tr>
    		<?php
    		if ($detail!=""){
    			$data=getDB("select san_pham.hinh_anh_1, san_pham.ma_sp, san_pham.ten_sp, san_pham.gia_sp, chi_tiet_hoa_don.so_luong, chi_tiet_hoa_don.thanh_tien, hoa_don.tong_tien from chi_tiet_hoa_don,hoa_don,san_pham where chi_tiet_hoa_don.ma_hd=$detail and san_pham.ma_sp=chi_tiet_hoa_don.ma_sp and chi_tiet_hoa_don.ma_hd=hoa_don.ma_hd");
			    while ($data1=mysqli_fetch_array($data)){
			    	$tongTien=$data1[6];
			    	?>
			    	<tr>
			    		<td width="30%">
			    			<img style="height: 100px;width: 50px" src="<?php echo $data1[0]?>"><br>
			    			<?php echo $data1[2]; ?>
			    		</td>
				    	<td width="20%"><?php echo $data1[3]?></td>
				    	<td width="20%"><?php echo $data1[4]?></td>
				    	<td width="20%"><?php echo $data1[5]?></td>
			    	</tr>
			    	<?php
			    }
    		}
				
    		?>
    		<tr>
    			<th colspan="4">Tổng tiền:<?php echo $tongTien;?> </th>
    		</tr>
    	</table>
    	</div>
	</div>
</div>
</div>
</div>
		</form>
</body>
</html>