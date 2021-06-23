<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.item{
			margin-bottom:20px;
			margin-right: 5px;
			margin-left: 5px;
			width: 23%;
			/*background-color: yellow;*/
			float: left;
			border-radius: 5px;
			border: 1px solid black;	
			transition-duration: 0.7s;
			text-align: center;
		}
		.item img{
			width: 100%;
		}
		.item a{
			text-decoration: none;
			color: red;
			font-size: 20px;
		}
		.item:hover{
			background-color: lightblue;
			transform:scale(1.2);
		}
	</style>
</head>
<body>
	<form action="#" method="get">
	<?php
        // $count=-1;
        // $count=mysqli_num_rows(getDB("select * from hoa_don"));
        // echo $count;
        // $queryGH= "SELECT san_pham.ten_sp,hinh_anh_1,gio_hang.so_luong,san_pham.gia_sp,san_pham.ma_sp FROM san_pham,gio_hang WHERE gio_hang.user='slick' and gio_hang.ma_sp=san_pham.ma_sp";
        //         $dat=getDB($queryGH);
        //         while ($dat1=mysqli_fetch_array($dat)){
        //             $tt=$dat1[2]*$dat1[3];
        //             echo $queryCTHD="INSERT INTO `chi_tiet_hoa_don`(`ma_hd`, `ma_sp`, `so_luong`, `thanh_tien`) VALUES ('$count','$dat1[4]',$dat1[2],$tt)";
        //             echo "<br>";
        //         }
	function getDB($query){
		$connection = mysqli_connect("localhost", "root", "", "qlbdt");
		$result = mysqli_query($connection, $query);	
		$connection=null;
		if ($result){
			return $result;
		}
		else{
			return false;
		}
	}
        function showItem($query){
        $db=getDB($query);
        if ($db!=false) {
            while ($row=mysqli_fetch_array($db)) {
                ?>
                <div class="item">
				<a href="?masp=<?php echo $row[0]?>">
					<img style="width: 200px;height: 200px" src="<?php echo $row[2]?>">
					<div style="text-align: center;">
						<?php echo $row[1];?>
					</div>
				</a>
			</div>
                <?php
            }
        }
    }
    showItem("select ma_sp,ten_sp,hinh_anh_1 FROM san_pham");
    ?>
	</form>
</body>
</html>