<?php 
    include 'nav.php'; 
    include 'Backend/dbconnect.php';
    if (!isset($_SESSION['loginuser'])){
?>

<div class="container my-5">
	<div class="offset-md-3 col-md-6">

		<div class="card shadow">
			<div class="card-body">

				<form method="POST" action="signup.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="photo">Profiles Photo</label>
						<input type="file" class="form-control-file" id="photo" name="photo" required="required" accept="image/png, image/jpeg">

					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" required="required">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" required="required">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="number" class="form-control" id="phone" name="phone" required="required">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" required="required">
					</div>
					<div class="form-group">
						<label for="cpassword">Confirm Password</label>
						<input type="password" class="form-control" id="cpassword" name="cpassword" required="required">
						<?php 
		                    if (isset($_SESSION['validate_cpassword_msg'])) {
		                  ?>
		                  <small class="text-danger"><?= $_SESSION['validate_cpassword_msg'] ?></small>
		                  <?php
		                    }
		                    unset($_SESSION['validate_cpassword_msg']);
		                    unset($_SESSION['old_cpassword']);
		                  ?>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
						<label class="form-check-label" for="male">
							Male
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="gender" id="female" value="Female">
						<label class="form-check-label" for="female">
							Female
						</label>
					</div>
					<br><br>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea id="address" name="address" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="cv">CV Resume</label>
						<input type="file" class="form-control-file" id="cv" name="cv" required="required" accept=".doc, .pdf">
					</div>
					<button type="submit" class="btn btn-primary">Signup</button>
				</form>
				
			</div>
		</div>
		
	</div>
</div>

<?php include 'footer.php';
	}else{
		header("location:index.php");
	}
 ?>
