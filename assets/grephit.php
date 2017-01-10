<?php
$menu = isset($_GET['m']) && !empty($_GET['m']) ? (string)$_GET['m'] : "";
$date = isset($_GET['d']) && !empty($_GET['d']) ? str_replace("-", ".", $_GET['d']) : "";

if($menu != '' && $date != '') {

	$hit = shell_exec("grep menu=$menu /data/apache/apache2_80/logs/access_log.$date | wc -l");
	echo $hit;

}