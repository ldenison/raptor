<!DOCTYPE html>
<html>
<head>
<title>Raptor ITSM</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="/common/img/favicon.png">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<link rel="stylesheet" href="/raptor/views/css/login.css">
<script type='text/javascript' src='/common/javascript/jquery-1.9.1.min.js'></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="title">
		<h1>Raptor</h1>
	</div>
	
	<div class="login-form">
		<form name="login" action="/raptor/controllers/usersController?action=login" method="post">
			<input type="text" class="form-control control-top" name="username" placeholder="Username">
			<input type="password" class="form-control control-middle" name="password" placeholder="Password"> 
			<input type="submit" class="btn btn-login" value="Login">
		</form>
	</div>
</body>
</html>