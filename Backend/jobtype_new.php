<?php 
require 'dbconnect.php';
$name=$_POST['name']; 

$sql="INSERT into job_types (type) VALUES(:type)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':type',$name);
	$stmt->execute();
	if($stmt->rowCount()){
		header("location:jobtype_list.php");
	}
	else{
		echo " Error !";
	}

?>
