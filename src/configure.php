<?php

if(file_exists('./devbuilder_config.php')) {
		die('config already exists');
}

if(isset($_GET['action']) && $_GET['action'] == 'save') {
		$folder_dst = getPostVar('folder_dst');
		$db_src_host = getPostVar('db_src_host');
		$db_src_dbname = getPostVar('db_src_dbname');
		$db_src_user = getPostVar('db_src_user');
		$db_src_pass = getPostVar('db_src_pass');
		$db_dst_host = getPostVar('db_dst_host');
		$db_dst_dbname = getPostVar('db_dst_dbname');
		$db_dst_user = getPostVar('db_dst_user');
		$db_dst_pass = getPostVar('db_dst_pass');
		$tool_user = getPostVar('tool_user');
		$tool_pass = getPostVar('tool_pass');
		
		$config_file_contents = '<?php

$cnf = array(
		\'folder_dst\' => \'' . escape_config_text($folder_dst) . '\',
		\'db_src\' => array(
				\'host\' => \'' . escape_config_text($db_src_host) . '\',
				\'dbname\' => \'' . escape_config_text($db_src_dbname) . '\',
				\'user\' => \'' . escape_config_text($db_src_user) . '\',
				\'pass\' => \'' . escape_config_text($db_src_pass) . '\',
		),
		\'db_dst\' => array(
				\'host\' => \'' . escape_config_text($db_dst_host) . '\',
				\'dbname\' => \'' . escape_config_text($db_dst_dbname) . '\',
				\'user\' => \'' . escape_config_text($db_dst_user) . '\',
				\'pass\' => \'' . escape_config_text($db_dst_pass) . '\',
		),
		\'user\' => \'' . escape_config_text($tool_user) . '\',		
		\'pass\' => \'' . escape_config_text($tool_pass) . '\'
);
';
		$fp = fopen('./devbuilder_config.php', 'w');
		fwrite($fp, $config_file_contents);
		fclose($fp);
		
		echo 'Konfiguration erfolgreich geschrieben';
		die;
}

?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>devbuilder - Konfigurationsprogramm</title>
<style>
		label {
				display: block;
		}
</style>
</head>
<body>
		<h1>Konfiguration festlegen</h1>
    <form action="configure.php?action=save" method="POST">
    		<h2>Ziel-Ordner</h2>
        <label for="folder_dst">Ziel-Ordner</label>
        <input name="folder_dst" id="folder_dst" type="text" value="" placeholder="z.B.: /var/www/vhosts/www1.test/dev" />
        
        <h2>Quell-Datenbank</h2>
        <label for="db_src_host">Hostname</label>
        <input name="db_src_host" id="db_src_host" type="text" value="" placeholder="z.B.: localhost" />
        
        <label for="db_src_dbname">Datenbank-Name</label>
        <input name="db_src_dbname" id="db_src_dbname" type="text" value="" placeholder="z.B.: mvdb1" />
        
        <label for="db_src_user">User</label>
        <input name="db_src_user" id="db_src_user" type="text" value="" placeholder="z.B rootadm1" />
        
        <label for="db_src_pass">Passwort</label>
        <input name="db_src_pass" id="db_src_pass" type="password" value="" placeholder="z.B. abc123! (haha, another joke here)" />
        
        <h2>Ziel-Datenbank</h2>
        <label for="db_dst_host">Hostname</label>
        <input name="db_dst_host" id="db_dst_host" type="text" value="" placeholder="z.B.: localhost" />
        
        <label for="db_dst_dbname">Datenbank-Name</label>
        <input name="db_dst_dbname" id="db_dst_dbname" type="text" value="" placeholder="z.B.: mvdb1" />
        
        <label for="db_dst_user">User</label>
        <input name="db_dst_user" id="db_dst_user" type="text" value="" placeholder="z.B rootadm1" />
        
        <label for="db_dst_pass">Passwort</label>
        <input name="db_dst_pass" id="db_dst_pass" type="password" value="" placeholder="z.B. abc123! (haha, another joke here)" />
        
        <h2>Tool-Zugangsdaten</h2>
        <label for="tool_user">Username für das Devbuilder-Tool:</label>
        <input name="tool_user" id="tool_user" type="text" value="" /><br />
        
        <label for="tool_pass">Passwort für das Devbuilder-Tool:</label>
        <input name="tool_pass" id="tool_pass" type="text" value="" /><br />
    		<br />
    		<button type="submit" id="mv-update">Config schreiben</button>
    </form>
</body>
</html><?php

function getPostVar($name) {
		if(!isset($_POST[$name])) {
				return null;
		}
		
		return $_POST[$name];
}

function escape_config_text($text) {
		$text = str_replace('\\', '\\\\', $text);
		$text = str_replace('\'', '\\\'', $text);
		
		return $text;
}
