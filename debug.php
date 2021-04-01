<?php
$logger = file_get_contents('log.txt');
$loggerLines = explode("\n", $logger);
?>

Logger:</br></br>

<?php
foreach ($loggerLines as $log){
	echo '' . $log . '</br>';
}
?>