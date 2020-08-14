<?php 

	include 'dbconnect.php';

	$uid = $_POST['id'];
	$uname = $_POST['name'];
	
	$sql = "UPDATE locations SET  name=:location_name WHERE id=:location_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':location_id',$uid);
	$stmt->bindParam(':location_name',$uname);	
	$stmt->execute();
	
	header("location:location_list.php");


?>