<?php

if(!file_exists('./devbuilder_config.php')) {
		die('config not found');
}

session_start();

if(!isset($_SESSION['devbuilder_logged_in'])) {
		header('Location: login.php');
		die();
}

if(file_exists('./update-end.php')) {
		echo 'Der letzte Update Vorgang wurde abgeschlossen am ';
		
		$content = file_get_contents('./update-end.php');
		
		echo $content;
		
		echo '<br /><br />';
}

if(file_exists('./update-start.php')) {
		die('Das Aktualisieren der Umgebung wurde gestartet aber noch nicht ausgeführt.');
}

if(file_exists('./update-running.php')) {
		die('Der Update Vorgang läuft.');
}

echo 'Aktuell ist weder ein Vorgang zum Starten aktiviert noch aktiv.';