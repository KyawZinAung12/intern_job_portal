<?php 
	include 'header.php'; 
	include 'dbconnect.php';

?>

<div class="container-fluid">	

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary d-inline-block">Job Type List</h2>
			<a href="jobtype_create.php" class="btn btn-primary float-right">+ Add Job Type</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Type</th>
							<th>Action</th>							
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>

						<?php 
						  $sql="SELECT * from job_types";
						  $stmt=$pdo->prepare($sql);
						  $stmt->execute();
						  $rows= $stmt->fetchAll();

						  $j=1;
						  foreach ($rows as $job_type):

						    $id = $job_type['id'];
						    $name = $job_type['type'];
						    

						    ?>
						<tr>
							<td><?= $j++ ?></td>
							<td><?= $name ?></td>
							<td>
								<a href="jobtype_edit.php?id=<?= $id ?>" class="btn btn-outline-warning"><i class="far fa-edit"></i></a>
								<a href="jobtype_delete.php?id=<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are You Sure Delete?')"><i class="far fa-trash-alt"></i></a>
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