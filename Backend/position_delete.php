<?php 
	
	include 'dbconnect.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM positions WHERE id=:position";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':position',$id);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:position_list.php");
	}else {
		echo "Error";
	}
?>