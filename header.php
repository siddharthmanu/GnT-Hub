<?php
	include 'dbconnect.php';
	session_start();
	if(isset($_SESSION['roll']))
	{
		$roll = $_SESSION['roll'];
	}
	else
	{
		header('Location: index');
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="mobile-web-app-capable" content="yes" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<title>GnT Hub</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/bootcards-desktop.min.css" rel="stylesheet" type="text/css" />
		<link href="css/morris.css" rel="stylesheet" />
		<link href="css/font-awesome.min.css" rel="stylesheet" />
		<link href="css/bootcards-demo-app.css" rel="stylesheet" />
		<link href="css/lightbox.min.css" rel="stylesheet" />
		<link href="css/custom.css" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/custom.js"></script>
	</head>

	<body id="bootcards">
		<!-- fixed top navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<button type="button" class="btn btn-default btn-back navbar-left pull-left hidden" onclick="history.back()">
					<i class="fa fa-lg fa-chevron-left"></i><span>Back</span>
				</button>
				<!-- menu button to show/ hide the off canvas slider -->
				<button type="button" class="btn btn-default btn-menu navbar-left pull-left offCanvasToggle" data-toggle="offcanvas">
					<i class="fa fa-lg fa-bars"></i><span>Menu</span>
				</button>
				<a class="navbar-brand no-break-out" title="GnT Hub" href="dashboard">
					<img src="icon.png" height="20px" style="float:left; margin-right:10px">Geeks & Technocrats
				</a>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li><a href="profile"><i class="fa fa-user"></i> Profile</a></li>
						<li><a href="contacts"><i class="fa fa-users"></i> Contacts</a></li>
						<!--<li><a href="locations"><i class="fa fa-map-marker"></i> Locations</a></li>
						<li><a href="companies"><i class="fa fa-building-o"></i> Companies</a></li>
						<li><a href="settings"><i class="fa fa-gears"></i> Settings</a></li>-->
						<li><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>
				</div>
			</div>
		</div>