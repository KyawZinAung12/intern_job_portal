<?php 
	
	$servername = "localhost";
	$dbname = "intern_job_portal";
	$dbuser = "root";
	$dbpassword = "";

	$dsn = "mysql:host=$servername;dbname=$dbname";
	$pdo = new PDO($dsn,$dbuser,$dbpassword);

	try{
		$conn = $pdo;
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		// echo "Conntected Successfully";

	}catch(PDOException $e)
	{
		echo "Connection fail:".$e->getMessage();
	}


?>