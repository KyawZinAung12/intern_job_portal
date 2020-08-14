<?php 
	include 'header.php';
	include 'dbconnect.php';


	$id = $_GET['id'];

	$sql = "SELECT * FROM locations WHERE id=:location_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':location_id',$id);
	$stmt->execute();
	$location = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid  mb-3">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Location Edit</h1>
		<a href="location_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="location_update.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $location['id'] ?>">

				<div class="form-group">
					<label>Name</label>
					<input type="text" value="<?= $location['name'] ?>" name="name" class="form-control">
				</div>				

				<input type="submit" value="Update" class="btn btn-outline-primary">
				
			</form>
		</div>
	</div>






</div>



<?php include 'footer.php'; ?>