<?php 

	include 'dbconnect.php';

	$uid = $_POST['id'];
	$uname = $_POST['name'];
	
	$sql = "UPDATE job_types SET  type=:type WHERE id=:jobtype";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':jobtype',$uid);
	$stmt->bindParam(':type',$uname);	
	$stmt->execute();
	
	header("location:jobtype_list.php");


?>