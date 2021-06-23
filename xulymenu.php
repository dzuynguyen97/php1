<?php
	session_start();
	$user="";
	if (isset($_SESSION['user'])){
		$user = $_SESSION['user'];	
	}else{
		$user="";
	}
	function showSocial(){
		?>
		<div class="Social">
		<div id="signin" onclick="login();"><img src="img/user.png" alt="" id="imgUser">
			<?php
				if (isset($_SESSION['name'])){
					echo $_SESSION['name'];
				}else{
					echo "Login";
				}
			?>
		</div>
		<div id="logo"><input type="submit" name="goHome" value="S & N"></div>
		<div class="qtv" style="margin-right: 20px">
			<div style="display: inline; text-align: left;width: 50%;" onclick="qtv();">
				<?php
					if (isset($_SESSION['quyen'])){
						if ($_SESSION['quyen']==2) echo "Quản trị viên";
					}
				?>
			</div>
			<div id="logout" onclick="dangxuat();" style="display: inline;text-align: right;width: 50%;float: right">
				<?php
					if (isset($_SESSION['name'])){
						echo "Đăng xuất";
					}
				?>
			</div>
			
		</div>
		
		
		<script>
		function home(){
			location.href='Index.php';
		}
		function qtv(){
			location.href='quanLy.php';
		}
		function dangxuat(){
			alert("Đăng xuất thành công!");
			location.href="logout.php"
		}
		function login(){
			location.href="login.php"
		}
		</script>
	</div>
		<?php
	}
	function getDB($query){
		$connection = mysqli_connect("localhost", "root", "", "btlduybeo");
		$result = mysqli_query($connection, $query);	
		$connection=null;
		if ($result){
			return $result;
		}
		
		else{
			return false;
		}
	}
	function insert_db($query){
		$conn=null;
		$conn=mysqli_connect('localhost','root','','btlduybeo') or die("Không thể kết nối tới cơ sở dữ liệu");
	        if($conn)
	        {
	        	mysqli_query($conn,"SET NAMES 'utf8'");
	        	$data=mysqli_query($conn,$query);
	        	if ($data>0){
	        		return true;
	        	}
	        	else{
	        		return false;
	        	}
	        }else{
	            echo "Bạn đã kết nối thất bại".mysqli_connect_erro();
	        }	
	}
	function showFooter(){
		?>
		<footer>
			<div class="noidung">
				<table class="itemfooter">
					<tr class="itemrow">
						<td class="itemcol">
							<h3 class="footerheading">Chăm sóc khách hàng</h3>
							<ul>
								<li ><a href="">Trung tâm trợ giúp</a></li>
								<li ><a href="" >S&N Mall</a></li>
								<li ><a href="" >Hướng dẫn mua hàng</a></li>
							</ul>
						</td>
						<td class="itemcol" >
							<h3 class="footerheading">Về S&N</h3>
							<ul >
								<li ><a href="" >Giới thiệu</a></li>
								<li ><a href="" >Tuyển dụng</a></li>
								<li ><a href="" >Điều khoản</a></li>
							</ul>
						</td>
						<td class="itemcol">
							<h3 class="footerheading">Theo dõi chúng tôi trên</h3>
							<ul >
								<li ><a href="https://www.facebook.com/profile.php?id=100007096803730" >Facebook</a></li>
								<li ><a href="https://www.facebook.com/imslickzz" >Instagram</a></li>
								<li ><a href="" >LinkIn</a></li>
	
							</ul>
							
						</td>
						<td class="itemcol">
							<h3 class="footerheading">Vào cửa hàng trên ứng dụng</h3>
							<img src="img/ma.png" width="100px" height="100px">
						</td>
					</tr>
					<tr >
						<td>
							<center><p style="color:#737373">© 2015 - Bản quyền thuộc về S&N</p></center>
						</td>
					</tr>
				</table>
			</div>	
			
		</footer>
		<?php
	}
	
	function showItem($query){
        $db=getDB($query);
        if ($db!=false) {
            while ($row=mysqli_fetch_array($db)) {
                ?>
                <div class="item">
				<a href="?showDetailItem=<?php echo $row[0]?>">
					<img style="" src="<?php echo $row[2]?>">
					<div style="text-align: center;">
						<?php echo $row[1];?>
					</div>
				</a>
				</div>
                <?php
            }
        }
     }
    if (isset($_REQUEST['showDetailItem'])){
    	$_SESSION['detailItem']=$_REQUEST['showDetailItem'];
    	header("location: detailItem.php");
    }
	function showMenu(){
		?>
		<div class="Menu">
			<ul class="root">
				<li>
					<input type="submit" name="index" value="Trang chủ ">
				</li>
				<li>
					<input type="submit" name="gioiThieu" value="Giới thiệu">
				</li>
				<li>
					<input type="submit" name="sanPham" value="Sản phẩm">
					<ul class="sub">
						<li>
							<input type="submit" name="12" value="iPhone 12 series">
							<ul class="sub2">
								<li>
									<input type="submit" name="12mini" value="iPhone 12 Mini">
								</li>
								<li>
									<input type="submit" name="12n" value="iPhone 12">
								</li>
								<li>
									<input type="submit" name="12pm" value="iPhone 12 Pro Max">
								</li>
							</ul>
						</li>
						<li>
							<input type="submit" name="11" value="iPhone 11 series">
							<ul class="sub2">
								<li>
									<input type="submit" name="11n" value="iPhone 11">
								</li>
								<li>
									<input type="submit" name="11p" value="iPhone 11 Pro">
								</li>
								<li>
									<input type="submit" name="11pm" value="iPhone 11 Pro Max">
								</li>
							</ul>
						</li>
						<li>
							<input type="submit" name="x" value="iPhone X series">
							<ul class="sub2">
								<li>
									<input type="submit" name="xn" value="iPhone X">
								</li>
								<li>
									<input type="submit" name="xs" value="iPhone XS">
								</li>
								<li>
									<input type="submit" name="xsm" value="iPhone XS Max">
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<input type="submit" name="gioHang" value="Giỏ hàng">
				</li>
				<li>
					<input type="submit" name="donHang" value="Đơn hàng">
				</li>
			</ul>
		</div>
		<?php
	}
	if (isset($_REQUEST['gioiThieuDetail'])){

	}elseif (isset($_REQUEST['csbm'])){

	}elseif (isset($_REQUEST['csdt'])) {
		
	}
	function showGT1(){
		?>
		<div class="contentGT">
			<div class="titleGT">
				Giới thiệu
			</div>
			<div class="detailGT">
				<table>
					<tr>
						<td style="padding: 10px;">
							<video loop="loop" style="width: 350px;height: 200px;border: 5px solid green;" autoplay muted><source src="img/Video/Cotton.mp4" type="video/mp4"> </video>
						</td>
						<td>
							<p>
							Công ty Cổ phần Đầu tư Thế Giới Di Động (S&N) là nhà bán lẻ số 1 Việt Nam về doanh thu và lợi nhuận, với mạng lưới gần 4.000 cửa hàng trên toàn quốc. S&N vận hành các chuỗi bán lẻ sn.com, Điện Máy Xanh, Bách Hoá Xanh. Ngoài ra, S&N đã mở rộng ra thị trường nước ngoài với chuỗi bán lẻ điện thoại và điện máy tại Campuchia.</p>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="padding: 10px;">
							<b>CÁC THƯƠNG HIỆU THUỘC S&N</b><br>
							<img src="img/1.png">
							<img src="img/2.png">
							<img src="img/3.png">
							<img src="img/4.png">
							<img src="img/5.png">
						</td>			
					</tr>
				</table>
			</div>
		</div>
	</div>
		<?php
	}
	function showGT2(){
		?>
		<div class="contentGT">
			<div class="titleGT">
				Chính sách bảo mật
			</div>
			<div class="detailGT">
				<p>Tại Samsung Electronics, chúng tôi coi việc bảo vệ thông tin cá nhân của bạn là ưu tiên hàng đầu.</p> 

				<p>Chúng tôi hiểu hoàn toàn rằng thông tin cá nhân của bạn là thuộc về bạn, vì vậy chúng tôi nỗ lực hết sức lưu trữ bảo mật và xử lý cẩn thận thông tin mà bạn chia sẻ với chúng tôi.</p>

				<p>Chúng tôi coi sự tin cậy của bạn có giá trị cao nhất. Vì vậy chúng tôi thu thập lượng thông tin tối thiểu chỉ khi có sự cho phép của bạn và sử dụng thông tin này chỉ cho các mục đích đã dự định. Chúng tôi không cung cấp thông tin cho các bên thứ ba mà không có sự hiểu biết của bạn.</p>

				<p>Tại Samsung Electronics chúng tôi nỗ lực hết sức nhằm đảm bảo khả năng bảo vệ dữ liệu của bạn, bao gồm bảo mật dữ liệu kỹ thuật và quy trình quản lý nội bộ cũng như các biện pháp bảo vệ dữ liệu vật lý. Đặc biệt là chúng tôi đã phát triển một công nghệ mã hóa mạnh dựa trên nền Samsung Knox. Chúng tôi đã áp dụng Samsung Knox trên các hệ thống và sản phẩm của chúng tôi, mang lại sự khác biệt cho chúng tôi trước các công ty khác.</p>

				<p>Chúng tôi phấn đấu cải thiện cuộc sống của bạn bằng cách đưa ra những trải nghiệm số đầy cảm hứng và hấp dẫn. Để thực hiện việc này, sự tin cậy của bạn là điều tối cao và vì vậy chúng tôi sẽ nỗ lực hết sức để bảo vệ thông tin cá nhân của bạn.</p>

				<p>Cảm ơn bạn vẫn tiếp tục quan tâm và ủng hộ chúng tôi.</p>
			</div>
		</div>

		</div>
		<?php
	}
	function showGT3(){
		?>
		<div class="contentGT">
			<div class="titleGT">
				CHÍNH SÁCH ĐỔI TRẢ SẢN PHẨM TẠI S&N
				<img src="img/csdt.png" width="80%" >
			</div>
			<div class="detailGT">
				<b>-Áp dụng từ: 01/01/2021</b><br>
				<b>-Nơi thực hiện đổi trả:Số 48, ngõ 2, đường Võ Quý Huân, Phường Phúc Diễn, Quận Bắc Từ Liêm, Thành phố Hà Nội </b>
				<table cellspacing="0">
					<tr>
						<td bgcolor="#04B431" colspan="2"><b>
						Sản phẩm lỗi do nhà sản xuất:</b></td>
						
					</tr>
					<tr>
						<td>
							Tháng 1
						</td>
						<td>
							Tháng 2 - 12
						</td>
					</tr>
					<tr>
						<td>
							<p><b>-1 đổi 1 (cùng mẫu, cùng màu, cùng dung lượng...).</b></p>
							<p>- Trường hợp sản phẩm đổi hết hàng, khách hàng có thể đổi sang sản phẩm khác cùng nhóm hàng có giá trị lớn hơn 50% giá trị sản phẩm lỗi (S&N.com sẽ hoàn tiền phần chênh lệch cho khách hàng).</p><br>
							<b>Hoặc:</b>
							<p>
							Khách hàng trả máy S&N.com hoàn lại tiền với mức giá bằng 80% giá trên hoá đơn.</p>

 
						</td>
						<td>
							<p>Gửi máy bảo hành theo quy định của hãng.</p>
							<b>Hoặc:</b>
							<p>Khách hàng trả máy S&N.com <b>hoàn lại tiền và thu phí thêm 5%</b> so với mức hoàn tiền khi trả ở tháng thứ 1</p>
							<b>VD:</b><p>Ở tháng thứ nhất, nếu khách hàng trả sản phẩm sẽ được hoàn lại tiền với mức giá bằng 80% thì sang tháng thứ 2 nếu khách hàng trả máy sẽ thu phí thêm 5% nên mức hoàn tiền sẽ còn 75% giá trị sản phẩm trên hoá đơn, tháng thứ 3 mức hoàn tiền sẽ trừ thêm 5% thành 70%....</p>
						</td>
						
					</tr>
					<tr >
						<td  bgcolor="#04B431" colspan="2">
							<b>Sản phẩm không lỗi (không phù hợp với nhu cầu của khách hàng):</b>
						</td>
						
					</tr>
					<tr>
						<td>
							<b>Tháng 1</b>
						</td>
						<td><b>Tháng 2-12</b></td>
					</tr>
					<tr>
						<td>Hoàn lại tiền máy với giá bằng 80% giá trên hoá đơn.</td>
						<td>
							<b>Hoàn lại tiền với mức phí thêm 5% </b><p>so với tháng thứ 1 (80%). VD: tháng thứ 2 hoàn lại tiền với mức giá 75% giá trên hoá đơn, tháng thứ 3 là 70%...</p>
						</td>
						
					</tr>
					<tr>
						<td colspan="2"><p>Công ty nhập lại sản phẩm cũ theo điều khoản "trả lại hàng" (*) đồng thời xuất bán lại sản phẩm mới.
						Phần chênh lệch giá là khoản phí sử dụng khách hàng phải trả và công ty xuất hoá đơn giá trị gia tăng (GTGT) cho khoản phí này.</p></td>
						
					</tr>
					<tr>
						<td bgcolor="#04B431" colspan="2"><b>Sản phẩm lỗi do người sử dụng:</b></td>
						
					</tr>
					<tr>
						<td colspan="2">
							<ul type="none">
								<li>- Không đủ điều kiện bảo hành theo qui định của hãng.</li>
								<li>- Máy không giữ nguyên 100% hình dạng ban đầu.</li>
								<li>- Màn hình bị trầy xước</li>
							</ul>
							<p><b>=> Không áp dụng bảo hành, đổi trả. Thegioididong.com hỗ trợ chuyển bảo hành, khách hàng chịu chi phí sửa chữa.</b></p>
							
						</td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
		<?php
	}
	function showGT($id){
		switch ($id) {
			case 1:
				showGT1();
				break;
			case 2:
				showGT2();
				break;
			case 3:
				showGT3();
				break;
		}
	}
	if (isset($_REQUEST['goHome'])){
		unset($_SESSION['query']);
		header("location: index.php");
	}
	if (isset($_REQUEST['index'])){
		unset($_SESSION['query']);
		header("location: index.php");
	}elseif (isset($_REQUEST['gioiThieu'])) {
		header("location: gioiThieu.php");
	}elseif (isset($_REQUEST['sanPham'])){
		header("location: index.php");
	}elseif (isset($_REQUEST['gioHang'])){
		if (isset($_SESSION['user'])){
			header("location: gioHang.php");	
		}else{
			header("location: login.php");
		}
		
	}elseif (isset($_REQUEST['donHang'])){
		if (isset($_SESSION['user'])){
			header("location: donHang.php");	
		}else{
			header("location: login.php");
		}
	}elseif (isset($_REQUEST['12'])){
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.seri=12";
		header("location: index.php");
	}elseif (isset($_REQUEST['11'])){
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.seri=11";
		header("location: index.php");
	}elseif (isset($_REQUEST['x'])){
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.seri='x'";
		header("location: index.php");
	}elseif (isset($_REQUEST['12mini'])) {
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone 12 Mini'";
		header("location: index.php");
	}elseif (isset($_REQUEST['12n'])) {
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone 12'";
		header("location: index.php");
	}elseif (isset($_REQUEST['12pm'])){
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone 12 Pro Max'";
		header("location: index.php");
	}elseif (isset($_REQUEST['11n'])) {
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone 11'";
		header("location: index.php");
	}elseif (isset($_REQUEST['11p'])) {
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone 11 Pro'";
		header("location: index.php");
	}elseif (isset($_REQUEST['11pm'])) {
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone 11 Pro Max'";
		header("location: index.php");
	}elseif (isset($_REQUEST['xn'])) {
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone X'";
		header("location: index.php");
	}elseif (isset($_REQUEST['xs'])) {
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone XS'";
		header("location: index.php");
	}elseif (isset($_REQUEST['xsm'])) {
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham, loai_dien_thoai WHERE loai_dien_thoai.ma_loai=san_pham.ma_loai and loai_dien_thoai.phien_ban='Iphone XS Max'";
		header("location: index.php");
	}
	// $conn=mysqli_connect('localhost','root','','btlduybeo') or die("Không thể kết nối tới cơ sở dữ liệu");
 //        if($conn)
 //        {
 //        	mysqli_query($conn,"SET NAMES 'utf8'");
 //        	$dataGHang=mysqli_query($conn,"SELECT san_pham.ten_sp,hinh_anh_1,gio_hang.so_luong,san_pham.gia_sp FROM san_pham,gio_hang WHERE gio_hang.user='$user' and gio_hang.ma_sp=san_pham.ma_sp");
 //            //echo "Bạn đã kết nối thành công";
 //        }else{
 //            echo "Bạn đã kết nối thất bại".mysqli_connect_erro();
 //        }
	function showGioHang(){
		global $user;
		$tongTien=mysqli_fetch_array(getDB("SELECT sum(gio_hang.so_luong*san_pham.gia_sp) as tong FROM `gio_hang`,san_pham WHERE user='$user' and san_pham.ma_sp=gio_hang.ma_sp"))[0];
		?>
		<div class="div2" style="border: 1px solid;text-align: center;width: 700px;">
			<table  id="table" onload="changeTable()">
				<tr >
					<th style="background-color: #F5BCA9;width: 60%">Tên sản phẩm</th>
					<th style="background-color: #F5BCA9; width: 20%;">Số lượng</th>
					<th style="background-color: #F5BCA9;width: 10%">Đơn giá</th>
					<th width="10%">
					</th>
				</tr>	
				<?php
				$queryString= "SELECT san_pham.ten_sp,hinh_anh_1,gio_hang.so_luong,san_pham.gia_sp,san_pham.ma_sp FROM san_pham,gio_hang WHERE gio_hang.user='$user' and gio_hang.ma_sp=san_pham.ma_sp";
                $data=getDB($queryString);
    			while ($data1=mysqli_fetch_array($data))
    			 { ?>
    				<tr>
    					<th>
                            <center><img width="50px" height="100px" src="<?php echo $data1[1];?>"></center>
                            <?php echo $data1[0]; ?>    
                        </th>
                       
    					<th><?php echo $data1[2]; ?></th>		
                        <th><?php echo $data1[3]; ?></th>       
                        <th><a href="?xoaSP=<?php echo $data1[4];?>">Xóa</a></th>
    				</tr>
    			<?php
    			}
    			?>
			</table>
			<br>
			<div>
				
				<div style="display: inline;">Tổng tiền:</div>
				<div style="display: inline" id="tinhtien"><?php echo $tongTien; ?></div>	
			</div>
		</div>
	</div>
		<?php
		
	}
	if (isset($_REQUEST['xoaSP'])){
		$maSP=$_REQUEST['xoaSP'];
		$rs=insert_db("DELETE FROM `gio_hang` WHERE ma_sp='$maSP' and user='$user'");
		if ($rs){
			showPopup("Xoa san pham thanh cong");	
		}
		
	}
	if ($user!=''){

	}
	
	if (isset($_REQUEST['xacnhan'])){
		if (trim($_REQUEST['sdt'])==''){
			showPopup("Bạn chưa nhập sđt");
		}
		elseif (trim($_REQUEST['diachi'])==''){
			showPopup("Bạn chưa nhập địa chỉ");	
		}
		else{
			$tongTien=mysqli_fetch_array(getDB("SELECT sum(gio_hang.so_luong*san_pham.gia_sp) as tong FROM `gio_hang`,san_pham WHERE user='$user' and san_pham.ma_sp=gio_hang.ma_sp"))[0];	
			$count=mysqli_num_rows(getDB("select * from hoa_don"))+1;
			$diachi=$_REQUEST['diachi'];
			$sdt=$_REQUEST['sdt'];
			$queryHD="INSERT INTO `hoa_don`(`ma_hd`, `user`, `dia_chi`, `sdt`, `tong_tien`) VALUES ('$count','$user','$diachi','$sdt',$tongTien)";
			$rs=insert_db($queryHD);
			if ($rs>0){
				$queryGH= "SELECT san_pham.ten_sp,hinh_anh_1,gio_hang.so_luong,san_pham.gia_sp,san_pham.ma_sp FROM san_pham,gio_hang WHERE gio_hang.user='$user' and gio_hang.ma_sp=san_pham.ma_sp";
                $dat=getDB($queryGH);
                while ($dat1=mysqli_fetch_array($dat)){
                    $tt=$dat1[2]*$dat1[3];
                    $queryCTHD="INSERT INTO `chi_tiet_hoa_don`(`ma_hd`, `ma_sp`, `so_luong`, `giasp`, `thanh_tien`) VALUES ('$count','$dat1[4]',$dat1[2],$dat1[3],$tt)";
                    $rs1=insert_db($queryCTHD);
                    $queryDelGH="DELETE FROM `gio_hang` WHERE ma_sp='$dat1[4]' and user='$user'";
                    $rs2=insert_db($queryDelGH);
                    if ($rs1 && $rs2){
                    	showPopup("Bạn đã đặt hàng thành công");
                    }
                    else{
                    	showPopup("Hệ thống lỗi vui lòng thử lại");	
                    }
                }

			}
		}
	}
	else{
		// $reportGH="";
	}
	function showPopup($mess){
		echo "<script type='text/javascript'>alert('$mess');</script>";
	}
	function showSearch(){
		?>
		<div class="Search">
			<div class="ElementSearch">
				<input type="text" size="50" style="height: 38px;border-radius: 8px;  padding-left: 50px" name="keywordSearch">
		        <input type="submit" name="submitSearch" style="width: 77px;height: 42px;border-radius: 5px;" value="Tìm kiếm">
	        </div>
		</div>
		<?php
	}
	if (isset($_REQUEST['submitSearch'])){
		if ($_REQUEST['keywordSearch']!=''){
			$keyword=$_REQUEST['keywordSearch'];
			$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham WHERE UPPER(ten_sp) LIKE UPPER('%$keyword%')";
			echo $_SESSION['query'];
			 header("location: index.php");
		}
	}
	function checkNum($s){
		if (trim($s)==''){
			return 1;
		}
		if (!is_numeric($s)){
			return 2;
		}
		return 0;
	}
	function solutionLocSP($x,$y){
		switch (checkNum($x)){
			case 1:
				$x=0;
				break;
			case 2:
				showPopup("Bạn phải nhập số vào ô lọc giá");
				break;
			case 3:
				break;
		}
		switch (checkNum($y)){
			case 1:
				$y=0;
				break;
			case 2:
				showPopup("Bạn phải nhập số vào ô lọc giá");
				break;
			case 3:
				break;
		}
		if ($x==0 && $y==0) return false;
		if ($x==0){
			$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham WHERE san_pham.gia_sp < $y";
			header("location: index.php");		
			return ;
		}
		if ($y==0){
			$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham WHERE san_pham.gia_sp > $y";
			header("location: index.php");		
			return ;	
		}
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham WHERE san_pham.gia_sp BETWEEN $x and $y";
		header("location: index.php");		
		return ;	
	}
	function showOrder(){
		?>
		<div style="line-height: 30px" class="Order">
				Bộ lọc sản phẩm <br>
				<input type="submit" name="sapXepTang" value="&nbsp&nbsp&nbsp" id="sapxep1">
				<input type="submit" name="sapXepGiam" value="&nbsp&nbsp&nbsp" id="sapxep2"><br>
				Giá từ:&nbsp<input type="text" name="Low" size="10">&nbsptới&nbsp<input type="text" name="High" size="10">&nbsp&nbsp
				<input type="submit" name="locsp" value="Lọc sản phẩm">
			</div>
		<?php
	}
	if (isset($_REQUEST['sapXepTang'])){
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham order by san_pham.gia_sp limit 15";
			header("location: index.php");		
	}
	if (isset($_REQUEST['sapXepGiam'])){
		$_SESSION['query']="SELECT ma_sp,ten_sp,hinh_anh_1 FROM san_pham order by san_pham.gia_sp desc limit 15";
			header("location: index.php");		
	}
	if (isset($_REQUEST['locsp'])){
		solutionLocSP($_REQUEST['Low'],$_REQUEST['High']);
	}
?>
