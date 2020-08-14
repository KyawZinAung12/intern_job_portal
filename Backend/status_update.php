<?php 

	include 'dbconnect.php';

	$uid = $_GET['id'];
	$status =1;
	
	$sql = "UPDATE job_requests SET  status=:status WHERE id=:status_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':status_id',$uid);
	$stmt->bindParam(':status',$status);	
	$stmt->execute();
	
	header("location:job_confirm.php");


?>