<?php
function insert_contact($contact){
	global $db;

	$sql = "INSERT INTO contact ";
	$sql .= "(name,email,subject,message)";
	$sql .= "VALUES (";
	$sql .= "'" . db_escape($db, $contact['name']). "',";
	$sql .= "'" . db_escape($db, $contact['email']). "',";
	$sql .= "'" . db_escape($db, $contact['subject']). "',";
	$sql .= "'" . db_escape($db, $contact['message']). "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	if($result){
	echo "<script> alert('Thanks we will get back to you within the next 25 minutes') </script>";
	echo"<script>window.open('sales.php','_self')</script>";
 	 }

	else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
}
}

function insert_sales($sale){
	global $db;

	$sql = "INSERT INTO sales ";
	$sql .= "(name,number,email,orders)";
	$sql .= "VALUES (";
	$sql .= "'" . db_escape($db, $sale['name']). "',";
	$sql .= "'" . db_escape($db, $sale['number']). "',";
	$sql .= "'" . db_escape($db, $sale['email']). "',";
	$sql .= "'" . db_escape($db, $sale['message']). "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	confirm_result_set($result);

	if($result){
	echo "<script> alert('Thanks we will get back to you within the next 25 minutes') </script>";
	echo"<script>window.open('sales.php','_self')</script>";
 	 }

	else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
}
}