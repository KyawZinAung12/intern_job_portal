<?php 
	include 'header.php'; 
	include 'dbconnect.php';

?>

<div class="container-fluid">	

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary d-inline-block">Position List</h2>
			<a href="position_create.php" class="btn btn-primary float-right">+ Add Position</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Photo</th>
							<th>Action</th>							
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>

						<?php 
						  $sql="SELECT * from positions";
						  $stmt=$pdo->prepare($sql);
						  $stmt->execute();
						  $rows= $stmt->fetchAll();

						  $j=1;
						  foreach ($rows as $position):

						    $id = $position['id'];
						    $name = $position['name'];
						    $photo = $position['photo'];
						    

						    ?>
						<tr>
							<td><?= $j++ ?></td>
							<td><?= $name ?></td>
							<td><img src="<?= $photo ?>" class="img-fluid"></td>
							<td>
								<a href="position_edit.php?id=<?= $id ?>" class="btn btn-outline-warning"><i class="far fa-edit"></i></a>
								<a href="position_delete.php?id=<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are You Sure Delete?')"><i class="far fa-trash-alt"></i></a>
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