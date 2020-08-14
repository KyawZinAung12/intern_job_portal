<?php 
require 'dbconnect.php';
$name=$_POST['name']; 
$photo=$_FILES['photo']; 
$basepath = "img/position_img/";
$fullpath = $basepath.$photo['name'];
move_uploaded_file($photo['tmp_name'], $fullpath);

$sql="INSERT into positions (name,photo) VALUES(:name,:photo)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':photo',$fullpath);
	$stmt->execute();
	if($stmt->rowCount()){
		header("location:position_list.php");
	}
	else{
		echo " Error !";
	}

?>
