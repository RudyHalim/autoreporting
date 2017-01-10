<?php
$menu = isset($_GET['m']) && !empty($_GET['m']) ? (string)$_GET['m'] : "";
$date = isset($_GET['d']) && !empty($_GET['d']) ? str_replace("-", ".", $_GET['d']) : "";

if($menu != '' && $date != '') {

	if($menu == 'regmeme22m') {
		$menu = 'menu=regmeme22m';
	}

	$shell_command = "grep $menu /data/apache/apache2_80/logs/access_log.$date | wc -l";
	$hit = shell_exec($shell_command);
	echo number_format($hit);

}