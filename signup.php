<?php 
	session_start();
    include 'Backend/dbconnect.php';

	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$photo=$_FILES['photo'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$cv=$_FILES['cv'];
	$role='seeker';

	$basepath = "img/user_img/";
	$photo_fullpath = $basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $photo_fullpath);

	$basepath = "cv/";
	$cv_fullpath = $basepath.$cv['name'];
	move_uploaded_file($cv['tmp_name'], $cv_fullpath);

	if ($password != $cpassword) {
		$_SESSION['validate_cpassword_msg']="User Confirm Password is not Equal Password!";
		header("location:register.php");
		
	}else{

	$sql = "INSERT INTO users (name,email,phone,gender,address,password,photo,cv,role) VALUES(:name,:email,:phone,:gender,:address,:password,:photo,:cv,:role)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':phone',$phone);
	$stmt->bindParam(':gender',$gender);
	$stmt->bindParam(':address',$address);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':photo',$photo_fullpath);
	$stmt->bindParam(':cv',$cv_fullpath);
	$stmt->bindParam(':role',$role);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:login.php");
	}else {
		echo "Error";
	}

}






 ?>