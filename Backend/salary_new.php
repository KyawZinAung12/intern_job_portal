<?php 
require 'dbconnect.php';
$amount=$_POST['amount']; 

$sql="INSERT into salaries (amount) VALUES(:amount)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':amount',$amount);
	$stmt->execute();
	if($stmt->rowCount()){
		header("location:salary_list.php");
	}
	else{
		echo " Error !";
	}

?>
