<?php
    include 'funciones.php';
	session_start();
    $alert = '';
	if(!empty($_SESSION['active'])){
		header('location: tabla.php');
	} else {
		if (!empty($_REQUEST)) {
			$_SESSION = comprobarLogin($_REQUEST['username'],$_REQUEST['password']);
			if(empty($_SESSION)){
				$alert = "usuario o contraseña incorrectos";
				$_SESSION['active'] = false;
				session_destroy();
			} else {
				$_SESSION['active'] = true;
				$alert = "sos un crack ".$_SESSION['active'];
				header('location: tabla.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/style.css">
	<title>Login</title>
</head>
<body>
	<form method ="post" action = "index.php">
		<h2>Login</h2>
		<label for="username">Username</label>
		<input type="text" id="username" name="username" value="">
		
		<label for="password">Password</label>
		<input type="password" id="password" name="password">
        <div><?php  echo $alert;?></div>
		<input type="submit" value="Login">
	</form>
</body>
</html>
