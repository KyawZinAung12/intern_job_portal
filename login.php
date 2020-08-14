<?php 
    include 'nav.php'; 
    include 'Backend/dbconnect.php';
    
    if (!isset($_SESSION['loginuser'])){

?>

<div class="container my-5">
	<div class="offset-md-3 col-md-6">

		<div class="card shadow">
			<div class="card-body">
				<h3 class="text-center pt-3">Login</h3>
				<form method="POST" action="signin.php" enctype="multipart/form-data" class="py-5 px-5">

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" required="required">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" required="required">
					</div>
					
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
				
			</div>
		</div>
		
	</div>
</div>

<?php 
	include 'footer.php';
	}else{
		header("location:index.php");
	}
	
 ?>
