<!DOCTYPE html>
<html>
<head>
	<?php
	include 'xulymenu.php';
	?>
	<title>S&N</title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="shortcut icon" href="img/logo.ico">
	<script type="text/javascript">
		var list= new Array();
		var result
		list[0] = "img/banner1.jpg";
		list[1] = "img/banner2.jpg";
		list[2] = "img/banner3.jpg";
		list[3] = "img/banner4.jpg";
			
		function changeImgBanner(){
			i=Math.floor(Math.random()*list.length);
			kq='<img src="'+list[i]+ '"style="width: 100%;border-radius: 10px">';
			document.getElementById("banner").innerHTML=kq;
			setTimeout(changeImgBanner,2000);
		}
	</script>
<?php
	// if (isset($_REQUEST['item'])){
	// 	$_SESSION['itemView']=$_REQUEST['item'][0];
	// 	header("location: detailItem.php");
	// }
?>
</head>
<style type="text/css">
	.contentSPI{
		width: 100%;
		margin-bottom: 1000px;

	}
	/*.content {
			width: 80%;			
			margin: 0px auto;
			display: inline-block;
			margin-left: calc(20% / 2);
	}*/
</style>
<body onload="changeImgBanner()">
	<form action="#" method="get">
		<?php
			showSocial();
			showMenu();
			showSearch();
		?>
		<div id="banner" style="width: 80%; margin: 0 auto">
			<img src="banner1.jpg" style="width: 100%; border-radius: 5px" >
		</div>
		<div class="content">
			<div class="title">
				<p>APPLE - AUTHORISED RESELLER</p>
			</div >
			<?php 
				showOrder(); 
			?>
			<div class="contentSPI">
				<div>
				<?php
					if (isset($_SESSION['query'])){
						showItem($_SESSION['query']);
					}
					else{			
						showItem("select ma_sp,ten_sp,hinh_anh_1 FROM san_pham limit 15");	
					}
				?>	
			</div>
			</div>
		</div>
		
		<?php
			 showFooter();
		?>
	</form>
</body>
</html>