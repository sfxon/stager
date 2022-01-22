<?php

if(!file_exists('./devbuilder_config.php')) {
		die('config not found');
}

require_once('./devbuilder_config.php');

session_start();

if(isset($_GET['action']) && $_GET['action'] == 'login') {
		$username = getPostVar('username');
		$password = getPostVar('password');
		
		if($username == $cnf['user'] && $password == $cnf['pass']) {
				$_SESSION['devbuilder_logged_in'] = 1;
		} else {
				die('Wrong username or password');
		}
		
		header('Location: index.php');
		die();
}



?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>devbuilder - Login</title>
<style>
		label {
				display: block;
		}
</style>
</head>
<body>
		<h1>Login</h1>
    <form action="login.php?action=login" method="POST">
    		<label for="username">Username</label>
        <input name="username" id="username" type="text" value="" />
    
        <label for="password">Passwort</label>
        <input name="password" id="password" type="password" value="" /><br />
    		<br />
    		<button type="submit" id="mv-update">Login</button>
    </form>
</body>
</html><?php

function getPostVar($name) {
		if(!isset($_POST[$name])) {
				return null;
		}
		
		return $_POST[$name];
}
