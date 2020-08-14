<?php 
require 'dbconnect.php';
$name=$_POST['name']; 

$sql="INSERT into locations (name) VALUES(:name)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->execute();
	if($stmt->rowCount()){
		header("location:location_list.php");
	}
	else{
		echo " Error !";
	}

?>
