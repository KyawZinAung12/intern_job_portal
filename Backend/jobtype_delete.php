<?php 
	
	include 'dbconnect.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM job_types WHERE id=:job_type";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':job_type',$id);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:jobtype_list.php");
	}else {
		echo "Error";
	}
?>