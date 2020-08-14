<?php 
	include 'header.php'; 
	include 'dbconnect.php';

?>

<div class="container-fluid">	

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary d-inline-block">Salary List</h2>
			<a href="salary_create.php" class="btn btn-primary float-right">+ Add Salary</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Amount</th>
							<th>Action</th>							
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Amount</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>

						<?php 
						  $sql="SELECT * from salaries";
						  $stmt=$pdo->prepare($sql);
						  $stmt->execute();
						  $rows= $stmt->fetchAll();

						  $j=1;
						  foreach ($rows as $salary):

						    $id = $salary['id'];
						    $amount = $salary['amount'];
						    

						    ?>
						<tr>
							<td><?= $j++ ?></td>
							<td><?= $amount ?></td>
							<td>
								<a href="salary_edit.php?id=<?= $id ?>" class="btn btn-outline-warning"><i class="far fa-edit"></i></a>
								<a href="salary_delete.php?id=<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are You Sure Delete?')"><i class="far fa-trash-alt"></i></a>
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