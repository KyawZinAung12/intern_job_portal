<?php 
	
	include 'dbconnect.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM salaries WHERE id=:salary";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':salary',$id);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:salary_list.php");
	}else {
		echo "Error";
	}
?>