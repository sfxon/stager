<?php

if(!file_exists('./devbuilder_config.php')) {
		die('config not found');
}

session_start();

if(!isset($_SESSION['devbuilder_logged_in'])) {
		header('Location: login.php');
		die();
}

if(file_exists('./update-start.php')) {
		die('Das Aktualisieren der Umgebung wurde gestartet. Bitte warte, bis der Vorgang abgeschlossen ist.');
}

if(isset($_GET['action']) && $_GET['action'] == 'update') {
		$fp = fopen('./update-start.php', 'w');
		fwrite($fp, date('Y-m-d H:i:s'));
		fclose($fp);
		
		echo 'Update gestartet';
		die;
}

?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>devbuilder</title>
</head>
<body>
		<h1>Dev-Umgebung aktualisieren</h1>
    <form action="index.php?action=update" method="POST">
    		<button type="submit" id="mv-update">Aktualisiere Umgebung</button>
    </form>
</body>
</html>
