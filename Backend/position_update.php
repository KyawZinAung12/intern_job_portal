<?php 

	include 'dbconnect.php';

	$uid = $_POST['id'];
	$uname = $_POST['name'];
	$fullpath = $_POST['old_photo'];
	$new_photo = $_FILES['new_photo'];

	if ($new_photo['size']>0) {
		$basepath = "img/position_img/";
		$fullpath = $basepath.$new_photo['name'];
		move_uploaded_file($new_photo['tmp_name'], $fullpath);
	}

	
	$sql = "UPDATE positions SET  name=:position_name,photo=:photo WHERE id=:position_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':position_id',$uid);
	$stmt->bindParam(':position_name',$uname);	
	$stmt->bindParam(':photo',$fullpath);	
	$stmt->execute();
	
	header("location:position_list.php");


?>