<?php 
	include 'header.php';
	include 'dbconnect.php';


	$id = $_GET['id'];

	$sql = "SELECT * FROM positions WHERE id=:position";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':position',$id);
	$stmt->execute();
	$position = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid  mb-3">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Position Edit</h1>
		<a href="position_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="position_update.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $position['id'] ?>">
				<input type="hidden" name="old_photo" value="<?= $position['photo'] ?>">

				<div class="form-group">
					<label>Name</label>
					<input type="text" value="<?= $position['name'] ?>" name="name" class="form-control">
				</div>

				<ul class="nav nav-tabs" id="myTab2" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#old_photo" role="tab" aria-controls="home" aria-selected="true">Photo</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#new_photo" role="tab" aria-controls="profile" aria-selected="false">New Photo </a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent2">
					<div class="tab-pane fade show active py-3" id="old_photo" role="tabpanel" aria-labelledby="home-tab">
						<img src="<?= $position['photo'] ?>" width="100" height="100">
					</div>
					<div class="tab-pane fade py-3" id="new_photo" role="tabpanel" aria-labelledby="profile-tab">
						<div class="form-group">
							<input type="file" name="new_photo" class="form-control-file">
							
						</div>
					</div>
				</div>	



				<input type="submit" value="Update" class="btn btn-outline-primary">
				
			</form>
		</div>
	</div>






</div>



<?php include 'footer.php'; ?>