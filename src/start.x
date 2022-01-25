<?php

$fp = fopen('./update-running.php', 'w');
fwrite($fp, date('Y-m-d H:i:s'));
fclose($fp);