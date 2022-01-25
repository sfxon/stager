<?php

unlink('./update-running.php');

$fp = fopen('./update-end.php', 'w');
fwrite($fp, date('Y-m-d H:i:s'));
fclose($fp);