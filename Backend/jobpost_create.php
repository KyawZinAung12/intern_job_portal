<?php 
	include 'header.php';
	include 'dbconnect.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid  mb-3">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">JobPost Create</h1>
		<a href="jobpost_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="jobpost_new.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Position</label>
					<select name="position" class="form-control">
						<option>Choose...</option>
						<?php 
							$sql = "SELECT * FROM positions";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$positions = $stmt->fetchAll();

							foreach ($positions as $position) {
								
								$id = $position['id'];
								$name = $position['name'];
							?>

								<option value="<?= $id ?>"><?= $name?></option>

							<?php
								}
							?>
					</select>
				</div>
				<div class="form-group">
					<label>Salary</label>
					<select name="salary" class="form-control">
						<option>Choose...</option>
						<?php 
							$sql = "SELECT * FROM salaries";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$salaries = $stmt->fetchAll();

							foreach ($salaries as $salary) {
								
								$id = $salary['id'];
								$amount = $salary['amount'];
							?>

								<option value="<?= $id ?>"><?= $amount?></option>

							<?php
								}
							?>
					</select>
				</div>
				<div class="form-group">
					<label>Location</label>
					<select name="location" class="form-control">
						<option>Choose...</option>
						<?php 
							$sql = "SELECT * FROM locations";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$locations = $stmt->fetchAll();

							foreach ($locations as $location) {
								
								$id = $location['id'];
								$name = $location['name'];
							?>

								<option value="<?= $id ?>"><?= $name?></option>

							<?php
								}
							?>
					</select>
				</div>
				<div class="form-group">
					<label>Job Type</label>
					<select name="job_type" class="form-control">
						<option>Choose...</option>
						<?php 
							$sql = "SELECT * FROM job_types";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$job_types = $stmt->fetchAll();

							foreach ($job_types as $job_type) {
								
								$id = $job_type['id'];
								$type = $job_type['type'];
							?>

								<option value="<?= $id ?>"><?= $type?></option>

							<?php
								}
							?>
					</select>
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description"></textarea>
				</div>				

				<input type="submit" value="Save" class="btn btn-outline-primary">
				
			</form>
		</div>
	</div>






</div>



<?php include 'footer.php'; ?>