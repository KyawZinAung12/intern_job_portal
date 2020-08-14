<?php 
	
	include 'dbconnect.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM locations WHERE id=:location_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':location_id',$id);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:location_list.php");
	}else {
		echo "Error";
	}
?>