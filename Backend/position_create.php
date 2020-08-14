<?php 
	include 'header.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid  mb-3">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Position Create</h1>
		<a href="position_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="position_new.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Position Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Position Photo</label>
					<input type="file" name="photo" class="form-control-file">
				</div>				

				<input type="submit" value="Save" class="btn btn-outline-primary mt-3">
				
			</form>
		</div>
	</div>






</div>



<?php include 'footer.php'; ?>