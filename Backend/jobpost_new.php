<?php 
require 'dbconnect.php';
$position=$_POST['position']; 
$salary=$_POST['salary']; 
$location=$_POST['location']; 
$job_type=$_POST['job_type']; 
$description=$_POST['description']; 

$sql="INSERT into job_posts (position_id,salary_id,location_id,description,type_id) VALUES(:position_id,:salary_id,:location_id,:description,:job_type_id)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':position_id',$position);
	$stmt->bindParam(':salary_id',$salary);
	$stmt->bindParam(':location_id',$location);
	$stmt->bindParam(':description',$description);
	$stmt->bindParam(':job_type_id',$job_type);
	$stmt->execute();
	if($stmt->rowCount()){
		header("location:jobpost_list.php");
	}
	else{
		echo " Error !";
	}

?>
