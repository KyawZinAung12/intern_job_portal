<?php 

	include 'dbconnect.php';

	$uid = $_POST['id'];
	$position = $_POST['position'];
	$salary = $_POST['salary'];
	$location = $_POST['location'];
	$job_type = $_POST['job_type'];
	$description = $_POST['description'];
	
	$sql = "UPDATE job_posts SET  position_id=:position,salary_id=:salary,location_id=:location,type_id=:job_type,description=:description WHERE id=:job_post";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':job_post',$uid);
	$stmt->bindParam(':position',$position);	
	$stmt->bindParam(':salary',$salary);	
	$stmt->bindParam(':location',$location);	
	$stmt->bindParam(':job_type',$job_type);	
	$stmt->bindParam(':description',$description);	
	$stmt->execute();
	
	header("location:jobpost_list.php");


?>