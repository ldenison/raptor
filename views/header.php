<?php if(!isset($_SESSION)){
	session_start();
}
/*
if(basename($_SERVER['PHP_SELF'])!='login.php' && !isset($_SESSION['raptor']['username'])) {
	header("Location: /raptor/views/login");
	die();
}
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>Raptor ITSM</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="/common/img/favicon.png">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<link rel="stylesheet" href="/raptor/views/css/header.css">
<link rel="stylesheet" href="/raptor/views/css/sidebar.css">
<link rel="stylesheet" href="/raptor/views/css/main.css">
<script type='text/javascript' src='/common/javascript/jquery-1.9.1.min.js'></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="/raptor/views/js/sidebar.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="/raptor/views/incidents">Raptor</a>
		</div>
		<div class='navbar-left'>
			<ul class='nav navbar-nav'>
				<li><a href='/raptor/views/request'>Link</a></li>
			</ul>
		</div>

		<div class='navbar-right pull-right'>
			<ul class='nav navbar-nav'>
				<li><a href="/raptor/views/users/profile"><i class="glyphicon glyphicon-user"></i></a></li>
				<li><a href="/raptor/views/users/profile"><i class="glyphicon glyphicon-cog"></i></a></li>
				<li><a href='/raptor/views/logout'>Log out</a></li>
			</ul>
		</div>
	</nav>
	<div class='container'>
		<div class='row main-content'>
			<?php if(isset($_SESSION['raptor']['message'])){?>

			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php echo $_SESSION['raptor']['message'];?> </strong>
			</div>
			<?php unset($_SESSION['raptor']['message']);
}
if(isset($_SESSION['raptor']['error'])){
	?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php echo $_SESSION['raptor']['error'];?> </strong>
			</div>
			<?php unset($_SESSION['raptor']['error']);
}?>