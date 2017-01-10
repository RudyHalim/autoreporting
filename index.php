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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<?php include("assets/footer.php"); ?>