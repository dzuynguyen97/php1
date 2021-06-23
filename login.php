<!DOCTYPE html>
<html>
<head>
	<?php
		include 'xulymenu.php'
	?>
	<title>S&N</title>
	<link rel="shortcut icon" href="img/logo.ico">
	<style type="text/css">
		*{
			padding: 0px;
			margin:0px;
		}
		.content{
			width: 30%;
			margin:150px auto;
			min-height: 270px;
			background-color: #ff549766;
		}
		.title{
			width: 100%;
			font-size: 45px;
			text-align: center;
			font-family:monospace;
			height: auto;
			margin-bottom: 20px;
		}
		.detail{
			width: 100%;
			text-align: center;
		}
		.detail > form{
			width: 100%;
			margin: 0 auto;
			align-content: center;
		}
		.detail > form > input{
			text-indent: 30px;
			width: 90%;
			height: 40px;
			margin-bottom: 10px;
			color:darkviolet;
			border-radius: 10px;
			border: 0px;
			font-size: 20px;
		}
		#login, #signin{
			text-indent: 0px;;
			width: 70%;
			height: 45px;
			border-radius: 15px;
		}
		#login:hover{
			background-color: orange;
			border-radius: 10px;
			border: 0px;
		}
		#signin:hover{
			background-color:indianred;
			border-radius: 10px;
			border: 0px;
		}
		.report{
			text-align: center;
			font-size: 30px;
			color: red;
		}
	</style>
</head>
<?php
	function checkAccount($id,$pw){
		$conn=mysqli_connect('localhost','root','','btlduybeo') or die("Không thể kết nối tới cơ sở dữ liệu");
        if($conn)
        {
        	mysqli_query($conn,"SET NAMES 'utf8'");
        	$query = "select * FROM info WHERE user='$id' and password='$pw'";
        	$data=mysqli_query($conn,$query);
        	if (mysqli_num_rows($data)==1){
        		$dt1=mysqli_fetch_array($data);
        		$_SESSION['quyen']=$dt1[3];
        		return $dt1[2];
        	}
        	else{
        		return false;
        	}
        }else{
            echo "Bạn đã kết nối thất bại".mysqli_connect_erro();
        }
	}
?>
<?php
	$report="";
	
	if (isset($_REQUEST['login'])){
		if (trim($_REQUEST['id']=='')){
			showPopup("Bạn chưa nhập username");
		}
		else{
			if (checkAccount($_REQUEST['id'],$_REQUEST['pw'])!=false){
				$_SESSION['user']=$_REQUEST['id'];
				$_SESSION['name']=checkAccount($_REQUEST['id'],$_REQUEST['pw']);
				showPopup("Đăng nhập thành công!");
				header("location: index.php");
				//echo $_SESSION['user']." ".$_SESSION['name'];
			}
			else{
				showPopup("Username hoặc password không đúng");
			}
		}
	}elseif(isset($_REQUEST['signin'])){
		header('location: signin.php');
	}
	if (isset($_REQUEST['goHome'])){
		header('location: index.php');
	}
?>
<body>
	<div class="content">
		<div class="title">
			<p>Login</p></div>
		<div class="detail">
			<form action="#" method="post">
				<input type="text" name="id" placeholder="Username"><br>
				<input type="password" name="pw" placeholder="Password"><br>
				<input type="submit" name="login" value="Login">
				<input type="submit" name="signin" value="Signin">
				<input type="submit" value="Back to home" name="goHome"><br>
			</form>
		</div>
		<div class="report">
			<?php
				// if ($report!=''){
				// 	echo $report;
				// } 
			?>
		</div>
	</div>
</body>
</html>