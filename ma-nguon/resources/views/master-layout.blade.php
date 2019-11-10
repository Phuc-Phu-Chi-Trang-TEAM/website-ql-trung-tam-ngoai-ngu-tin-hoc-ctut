<!DOCTYPE HTML>
<html>
<head>
		
	<title>Trung tâm Ngoại ngữ và Tin học CTUT</title>
	<meta charset="utf-8"> 
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<base href="{{asset('')}}">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.2.custom.js"></script>
	<link rel="stylesheet" 	href="assets/css/ui-lightness/jquery-ui-1.10.2.custom.css" />

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    
</head>
<body>
	<div id="pageWrapper">
		<div id="header">
			
			<h1 id="siteTitle"> Hệ Thống Quản lý trung tâm Ngoại ngữ - Tin học </h1>
				
		</div> 
		<!-- End of header -->
		
		<div id="nav"> 
		<div  id="menu" > 
			<a href="trang-chu">Trang chủ</a> |  
			<a href="trang-chu">Giới thiệu</a>	|
			<a href="trang-chu">Tin tức - Sự kiện</a>  | 
			<a href="trang-chu">Quản lý trung tâm Ngoại ngữ - Tin học</a>  | 
			<a href="trang-chu">Tuyển sinh</a>		 
		</div>		 
		<!-- <div  id="login" > 
			<?php 
				// lấy cookie đăng nhập tự động
				 
				if (isset($_SESSION["loggedin"])){
					echo "Xin chào ". $_SESSION["HoTen"];
					echo " | <a href='login.php?logut' id='aLogout'>Thoát</a>";	
				}else {
					
					echo "<a href='login.php'>Đăng nhập</a>";
				}
			?>
		</div> -->
		</div>
		 <!-- End of Navigation menu --> 
		
		<div id="contentWrapper" > 
			<div id="leftSide" > 
				<div class="group-box" id="danhmuc"> 
						<div class="title ui-widget-header ui-corner-all">Menu 1</div>  
						<div class="group-box-content">
							<ul>
								@if (isset($username))
								<li style="font-weight:normal">Xin chào <b>{{$username}}</b></li>
								@endif								
								<li> <a href="dang-xuat">Đăng xuất</a> </li>
								<li> <a href="quan-ly-nguoi-dung">Quản lý người dùng</a> </li>
								<li> <a href="dang-ky-hoc-vien">Đăng ký học viên</a> </li>
								<li> <a href="quan-ly-giao-vien">Quản lý giáo viên</a> </li>
								<li> <a href="phan-cong-giang-day">Phân công giảng dạy</a> </li>
								<li> <a href="xem-lich-giang">Xem lịch giảng</a> </li>
							</ul>						
						</div>						
				</div>
				<div class="group-box"> 
						<div class="title ui-widget-header ui-corner-all">Menu 2</div> 
						<div class="group-box-content">
						<ul>							
							<li> <a href="quan-ly-phong-hoc">Quản lý phòng học</a> </li>
							<li> <a href="quan-ly-buoi-hoc">Quản lý buổi học</a> </li>
							<li> <a href="quan-ly-chung-chi">Quản lý chứng chỉ</a> </li>
							<li> <a href="quan-ly-khoa-hoc">Quản lý khóa học</a> </li>
							<li> <a href="quan-ly-lop-hoc">Quản lý lớp học</a> </li>
							
						</ul>						
						</div>						
				</div>
            </div> <!-- End of Left Side -->
            
    {{-- content --}}
            @yield('content');
	{{-- end content --}}

	<script src="assets/js/load-ajax.js"></script>

</div> <!-- End of Content Wrapper -->
	<div id="footer"> 
	Copyright &copy; 2019 by PPCT Team | Design by Phúc-Phú-Chí-Trang
	</div>	
</div> <!-- End of pageWrapper -->
</body>
</html>