<?php
session_start(); 
include 'Backend/dbconnect.php';

$user_id=$_SESSION['loginuser']['id'];
$job_post_id=$_GET['id']; 
$status=0; 

$sql="INSERT INTO job_requests (job_post_id,user_id,status) VALUES(:job_post_id,:user_id,:status)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':job_post_id',$job_post_id);
	$stmt->bindParam(':user_id',$user_id);
	$stmt->bindParam(':status',$status);	
	$stmt->execute();
	if($stmt->rowCount()){
		header("location:job_listing.php");
	}
	else{
		echo " Error !";
	}

?>
