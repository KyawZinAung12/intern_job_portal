<?php 
	include 'header.php'; 
	include 'dbconnect.php';

?>

<div class="container-fluid">	

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary d-inline-block">Job Post List</h2>
			<a href="jobpost_create.php" class="btn btn-primary float-right">+ Add JobPost</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Position</th>
							<th>Salary</th>							
							<th>Location</th>							
							<th>Jop_Type</th>							
							<th>Description</th>							
							<th>Action</th>							
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Position</th>
							<th>Salary</th>							
							<th>Location</th>
							<th>Jop_Type</th>
							<th>Description</th>							
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>

						<?php 
						  $sql="SELECT job_posts.*,positions.name as position_name,salaries.amount as salary_amount,locations.name as location_name,job_types.type as jobtype FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN job_types ON job_posts.type_id=job_types.id";
						  $stmt=$pdo->prepare($sql);
						  $stmt->execute();
						  $rows= $stmt->fetchAll();

						  $j=1;
						  foreach ($rows as $job_post):

						    $id = $job_post['id'];
						    $position = $job_post['position_name'];
						    $salary = $job_post['salary_amount'];
						    $location = $job_post['location_name'];
						    $jobtype = $job_post['jobtype'];
						    $description = $job_post['description'];
						    

						    ?>
						<tr>
							<td><?= $j++ ?></td>
							<td><?= $position ?></td>
							<td><?= $salary ?></td>
							<td><?= $location ?></td>
							<td><?= $jobtype ?></td>
							<td><?= $description ?></td>
							<td>
								<a href="jobpost_edit.php?id=<?= $id ?>" class="btn btn-outline-warning"><i class="far fa-edit"></i></a>
								<a href="jobpost_delete.php?id=<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are You Sure Delete?')"><i class="far fa-trash-alt"></i></a>
							</td>							
						</tr>
						<?php endforeach; ?>						
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>



<?php include 'footer.php'; ?>