<?php 

	include 'dbconnect.php';

	$uid = $_POST['id'];
	$amount = $_POST['amount'];
	
	$sql = "UPDATE salaries SET  amount=:amount WHERE id=:amount_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':amount_id',$uid);
	$stmt->bindParam(':amount',$amount);	
	$stmt->execute();
	
	header("location:salary_list.php");


?>