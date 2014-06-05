<?php if(!isset($_SESSION)){
	session_start();
}
if(basename($_SERVER['PHP_SELF'])!='login.php' && !isset($_SESSION['raptor']['username'])) {
	header("Location: /raptor/views/login");
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Raptor ITSM</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="/common/img/favicon.png">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<script type='text/javascript' src='/common/javascript/jquery-1.9.1.min.js'></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="/affiliations/views">Home</a>
		</div>
		<div class='navbar-left'>
			<ul class='nav navbar-nav'>
				<li><a href='/affiliations/views/request'>Request New Agreement</a></li>
			<?php if($_SESSION['affiliations']['admin']==1){?>
				<li><a href='/affiliations/views/previous-requests'>Previous Requests</a></li>
				<li><a href='/affiliations/views/admin/add-agreement'>Add</a></li>
				<li><a href='/affiliations/views/admin/archived'>Archived</a></li>
				<li><a href='/affiliations/views/admin/users'>Users</a></li>
				<li><a href='/affiliations/views/admin/reports'>Reports</a></li>
			<?php }?>
			</ul>
		</div>

		<div class='navbar-right pull-right'>
			<ul class='nav navbar-nav'>
			<?php if($_SESSION['affiliations']['admin']==1){?>
				<li><a href='/affiliations/controllers/usersController?action=dropSessionAdmin'>Drop Admin Access</a></li>
			<?php }?>
				<li><a href='/affiliations/views/logout'>Log out</a></li>
			</ul>
		</div>
	</nav>
	<div class='container'>
		<div class='row main-content'>
			<?php if(isset($_SESSION['affiliations']['message'])){?>

			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php echo $_SESSION['affiliations']['message'];?> </strong>
			</div>
			<?php unset($_SESSION['affiliations']['message']);
}
if(isset($_SESSION['affiliations']['error'])){
	?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php echo $_SESSION['affiliations']['error'];?> </strong>
			</div>
			<?php unset($_SESSION['affiliations']['error']);
}?>