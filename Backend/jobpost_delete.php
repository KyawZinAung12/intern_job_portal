<?php 
	
	include 'dbconnect.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM job_posts WHERE id=:job_post";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':job_post',$id);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:jobpost_list.php");
	}else {
		echo "Error";
	}
?>