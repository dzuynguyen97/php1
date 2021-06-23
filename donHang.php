<!DOCTYPE html>
<html>
<?php
	include 'xulymenu.php';
	if (!isset($_SESSION['user'])){
		header("location: login.php");
	}
?>
<link rel="shortcut icon" href="img/logo.ico">
<link rel="stylesheet" type="text/css" href="layout.css">
<head>
	<title>Đơn hàng của <?php echo $user ?></title>
</head>
<body>
	<form action="#" method="get">
		<?php
			showSocial();
			showMenu();
			$tongTien="";
			$detail="";
			if (isset($_REQUEST['detail'])){
				$detail=$_REQUEST['detail'];
			}
		?>	
	
	<div class="content" style="">
		<div class="content" style="width: 100%">
    	<table border="2" style="width: 100%;text-align: center;font-size: 30px" >
    		<tr >
    			<th>Mã đơn</th>
    			<th>Địa chỉ</th>
    			<th>Số điện thoại</th>
    			<th>Ngày đặt hàng</th>
    			<th>Tổng tiền hóa đơn</th>
    			<th>Chi tiết</th>
    		</tr>
    		<?php
				$data=getDB("select * from hoa_don where user='$user'");
			    while ($data1=mysqli_fetch_array($data)){
			    	?>
			    	<tr>
			    		<td width="10%"><?php echo $data1[0]?></td>
				    	<td width="15%"><?php echo $data1[2]?></td>
				    	<td width="15%"><?php echo $data1[3]?></td>
				    	<td width="20%"><?php echo $data1[4]?></td>
				    	<td width="30%"><?php echo $data1[5]?></td>	
				    	<td width="10%"><a href="?detail=<?php echo $data1[0]?>">Chi tiết</a></td>
			    	</tr>
			    	<?php
			    	
			    }
    		?>
    	</table>
    </div>
    <div style="min-height: 200px">
    	
    </div>
    <div class="content" style="margin-bottom: 100px">
		<div class="content" style="width: 100%">
    	<table border="2" style="width: 100%;text-align: center;font-size: 30px" >
    		<tr>
    			<th>Sản phẩm</th>
    			<th>Giá sản phẩm</th>
    			<th>Số lượng</th>
    			<th>Thành tiền</th>
    		</tr>
    		<?php
    		if ($detail!=""){
    			// echo "select san_pham.hinh_anh_1, san_pham.ma_sp, san_pham.ten_sp, chi_tiet_hoa_don.gia_sp, chi_tiet_hoa_don.so_luong, chi_tiet_hoa_don.thanh_tien, hoa_don.tong_tien from chi_tiet_hoa_don,hoa_don,san_pham where chi_tiet_hoa_don.ma_hd=$detail and san_pham.ma_sp=chi_tiet_hoa_don.ma_sp and chi_tiet_hoa_don.ma_hd=hoa_don.ma_hd";
    			$data=getDB("select san_pham.hinh_anh_1, san_pham.ma_sp, san_pham.ten_sp, chi_tiet_hoa_don.giasp, chi_tiet_hoa_don.so_luong, chi_tiet_hoa_don.thanh_tien, hoa_don.tong_tien from chi_tiet_hoa_don,hoa_don,san_pham where chi_tiet_hoa_don.ma_hd=$detail and san_pham.ma_sp=chi_tiet_hoa_don.ma_sp and chi_tiet_hoa_don.ma_hd=hoa_don.ma_hd");

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
	</form>
</body>
</html>