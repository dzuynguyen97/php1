<!DOCTYPE html>
<html>
<head>
	<?php
		include 'xulymenu.php';
		?>
	<title>S&N</title>
	<link rel="shortcut icon" href="img/logo.ico">
	<style type="text/css">
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
		#login, #signin, #home{
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
		#home:hover{
			background-color:orange;
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
<body>
	<div class="content">
		<div class="title">Sign in</div>
		<div class="detail">
			<form action="#" method="post">
				<input type="text" name="id" placeholder="Username for login" id="userSignIn"><br>
				<input type="text" name="name" placeholder="Full name"><br>
				<input type="password" placeholder="Password" name="pw1"><br>
				<input type="password"  placeholder="Confirm password" name="pw2"><br>
				<input type="submit" name="signin" value="Sign in">
				<input type="submit" value="Back to home" name="goHome"><br>
				<input type="submit" value="Back to login" name="gologin"><br>
			</form>
			<?php
				function checkAccount($id){
					$conn=mysqli_connect('localhost','root','','btlduybeo') or die("Không thể kết nối tới cơ sở dữ liệu");
			        if($conn)
			        {
			        	mysqli_query($conn,"SET NAMES 'utf8'");
			        	$query = "select * FROM info WHERE user='$id'";
			        	$data=mysqli_query($conn,$query);
			        	if (mysqli_num_rows($data)==1){
			        		return true;
			        	}
			        	else{
			        		return false;
			        	}
			        }else{
			            echo "Bạn đã kết nối thất bại".mysqli_connect_erro();
			        }
				}
				
				if (isset($_REQUEST['signin'])){
					if ($_REQUEST['id']==''){
						showPopup("Bạn chưa nhập username!");
					}
					elseif ($_REQUEST['name']==''){
						showPopup("Bạn chưa nhập tên của bạn!");
					}else{
						$id=$_REQUEST['id'];
						$pw1=$_REQUEST['pw1'];
						$pw2=$_REQUEST['pw2'];
						$name=$_REQUEST['name'];
						if ($pw1!=$pw2){
							showPopup("Password không khớp");
						}else{
							if (checkAccount($id)==true){
								showPopup("Đã có người sử dụng username này!");
							}
							else{
								$query="insert into info value ('$id','$pw1','$name','1')";
								if (insert_db($query)==true) 
									{
										showPopup("Đăng ký thành công!");
										header('location: login.php');
									}
							}
						}
					}

				}elseif (isset($_REQUEST['goHome'])) {
					header("location: index.php");
				}elseif (isset($_REQUEST['gologin'])) {
					header("location: login.php");
				}
			?>
		</div>
		<div class="report">
			<?php
				
			?>
		</div>
	</div>
</body>
</html>