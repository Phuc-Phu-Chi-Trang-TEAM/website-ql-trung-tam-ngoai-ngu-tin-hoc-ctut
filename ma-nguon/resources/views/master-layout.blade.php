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
			<a href="">Trang chủ</a> |  
			<a href="">Giới thiệu</a>	|
			<a href="">Tin tức - Sự kiện</a>  | 
			<a href="">Quản lý trung tâm Ngoại ngữ - Tin học</a>  | 
			<a href="">Tuyển sinh</a>		 
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
						<div class="title ui-widget-header ui-corner-all">DANH MỤC</div>  
						<div class="group-box-content">
							<ul>								
								<li> <a href="">Đăng nhập</a> </li>
								<li> <a href="">Quản lý người dùng</a> </li>
								<li> <a href="">Quản lý khóa học</a> </li>
								<li> <a href="">Quản lý lớp học</a> </li>
								<li> <a href="">Quản lý buổi học</a> </li>
								<li> <a href="">Quản lý giáo viên</a> </li>
							</ul>						
						</div>						
				</div>
				<div class="group-box"> 
						<div class="title ui-widget-header ui-corner-all">Menu</div> 
						<div class="group-box-content">
						<ul>							
							<li> <a href="">Quản lý phòng học</a> </li>
							<li> <a href="">Quản lý chứng chỉ</a> </li>
							<li> <a href="">Phân công giảng dạy</a> </li>
							<li> <a href="">Xem lịch giảng</a> </li>
							<li> <a href="">Đăng ký học viên</a> </li>
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
	Copyright &copy; 2019 by PPCT Team
	</div>	
</div> <!-- End of pageWrapper -->
</body>
</html>