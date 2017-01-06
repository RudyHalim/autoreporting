<?php
include("config.php");
?>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<h3>Generate Lingua Report</h3>

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