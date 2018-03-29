<?php
ob_start();
session_start();
require_once 'config/database.php';
require_once 'class/class.user.php';
require_once 'config/function.php';
$user = new User();
if ($user->isLogin()=='') {
  header('Location:index.php');
}
if (isset($_POST['logout'])) {
  $user->logout();
  header('Location:index.php');
}
?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
	<title>Colored an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="assets/css/font.css" type="text/css" />
	<link href="assets/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="assets/js/jquery2.0.3.min.js"></script>
	<script src="assets/js/modernizr.js"></script>
	<script src="assets/js/jquery.cookie.js"></script>
	<script src="assets/js/screenfull.js"></script>
	<script>
		$(function() {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}



			$('#toggle').click(function() {
				screenfull.toggle($('#container')[0]);
			});
		});
	</script>
	<!-- charts -->
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.js"></script>
	<link rel="stylesheet" href="assets/css/morris.css">
	<!-- //charts -->
	<!--skycons-icons-->
	<script src="assets/js/skycons.js"></script>
	<!--//skycons-icons-->
	<!-- tables -->
	<link rel="stylesheet" type="text/css" href="assets/css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/basictable.css" />
	<script type="text/javascript" src="assets/js/jquery.basictable.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#table').basictable();

			$('#table-breakpoint').basictable({
				breakpoint: 768
			});

			$('#table-swap-axis').basictable({
				swapAxis: true
			});

			$('#table-force-off').basictable({
				forceResponsive: false
			});

			$('#table-no-resize').basictable({
				noResize: true
			});

			$('#table-two-axis').basictable();

			$('#table-max-height').basictable({
				tableWrapper: true
			});
		});
	</script>
	<!-- //tables -->
	<script src="assets/js/vue.min.js"></script>
	<script src="assets/js/axioos.min.js"></script>
</head>

<body class="dashboard-page">
	<script>
		var theme = $.cookie('protonTheme') || 'default';
		$('body').removeClass(function(index, css) {
			return (css.match(/\btheme-\S+/g) || []).join(' ');
		});
		if (theme !== 'default') $('body').addClass(theme);
	</script>
	<nav class="main-menu">
		<ul>
			<li>
				<a href="dashboard.php">
					<i class="fa fa-home nav_icon"></i>
					<span class="nav-text">
					Dashboard
					</span>
				</a>
			</li>
			<li>
				<a href="soal.php">
				<i class="fa fa-check-square-o nav_icon"></i>
				<span class="nav-text">
				Soal
				</span>
				</a>
			</li>
      <li>
				<a href="player.php">
				<i class="fa fa-check-square-o nav_icon"></i>
				<span class="nav-text">
				Player
				</span>
				</a>
			</li>
      <li>
				<a href="bab.php">
				<i class="fa fa-check-square-o nav_icon"></i>
				<span class="nav-text">
				Bab
				</span>
				</a>
			</li>
		</ul>
	</nav>
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar">
			<div class="logo">
				<h1><a href="index.html"><img src="assets/images/logo.png" alt="" />Colored</a></h1>
			</div>
			<div class="full-screen">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
				</section>
			</div>
			<div class="w3l_search">
				<form action="#" method="post">
					<input type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
					<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
			<div class="header-right">
				<div class="profile_details_left">

					<div class="profile_details">
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">
										<span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span>
										<div class="clearfix"></div>
									</div>
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
									<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
									<li> <a href="#">
									<form method="post">
		 							<input class="btn btn-primary" type="submit" name="logout" value="Logout"></a> </li>
									</form>
								</ul>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</section>
