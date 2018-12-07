<?php
	//include("confs/config.php");
	
	$id = $_GET['q'];
	$result = mysql_query("SELECT * FROM category_subcategory_view WHERE id = $id");
	$row = mysql_fetch_assoc($result);
	echo $row['name'] . " (" . $row['main_category_name'] . ")";
?>