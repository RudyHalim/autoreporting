<?php
include("config.php");
?>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<h3>Generate Auto Reporting</h3>

<?php
if(isset($_GET) && !empty($_GET)) {
	echo "<pre>";
	print_r($_GET);
} else {
	include("assets/form.php");
}
?>

<div id="results"></div>

<script type="text/javascript" src="js/jquery.js"></script>

<?php include("assets/footer.php"); ?>