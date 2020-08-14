<?php 
  include 'header.php'; 
  include 'dbconnect.php';    
?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">JOB POST</div>
                <div class="h5 mb-0 font-weight-bold text-danger">
                  <?php  
                    $sql="SELECT COUNT(*) FROM job_posts";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute();
                    $rows= $stmt->fetchColumn();
                    // $count=count($rows);

                    echo $rows;
                  ?>
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Job Request</div>
                <div class="h5 mb-0 font-weight-bold text-danger">
                  <?php  
                    $sql="SELECT COUNT(*) FROM job_requests";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute();
                    $rows= $stmt->fetchColumn();
                    // $count=count($rows);

                    echo $rows;
                  ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Confirm Jobs</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                      <?php  
                        $sql="SELECT COUNT(*) FROM job_requests WHERE job_requests.status=1";
                        $stmt=$pdo->prepare($sql);
                        $stmt->execute();
                        $rows= $stmt->fetchColumn();
                        // $count=count($rows);

                        echo $rows;
                      ?>
                    </div>
                  </div>
                  <div class="col">
                    
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php  
                    $sql="SELECT COUNT(*) FROM job_requests WHERE job_requests.status=0";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute();
                    $rows= $stmt->fetchColumn();
                    // $count=count($rows);

                    echo $rows;
                  ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

  </div>
  <!-- /.container-fluid -->
  <div class="container-fluid"> 

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone</th>
              <th>CV File</th>
              <th>Action</th>             
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone</th>
              <th>CV File</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>

            <?php 
              $sql="SELECT job_requests.*,users.name as user_name,users.email as user_email,users.address as user_address,users.phone as user_phone,users.cv as user_cv FROM job_requests INNER JOIN users ON job_requests.user_id=users.id WHERE job_requests.status=0";
              $stmt=$pdo->prepare($sql);
              $stmt->execute();
              $rows= $stmt->fetchAll();

              $j=1;
              foreach ($rows as $job_request):

                $id = $job_request['id'];
                $name = $job_request['user_name'];
                $email = $job_request['user_email'];
                $address = $job_request['user_address'];
                $phone = $job_request['user_phone'];
                $CvFile = $job_request['user_cv'];
                

                ?>
            <tr>
              <td><?= $j++ ?></td>
              <td><?= $name ?></td>
              <td><?= $email ?></td>
              <td><?= $address ?></td>
              <td><?= $phone ?></td>
              <td><a href="<?= $CvFile ?>" class="btn btn-outline-primary" target="_blank">View PDF</a></td>
              <td>
                
               <!--  <a href="position_edit.php?id=<?= $id ?>" class="btn btn-outline-success">Confirm</a> -->
              
                <a href="status_update.php?id=<?= $id ?>" class="btn btn-outline-warning" onclick="return confirm('Are You Sure?')">Pending</a>
              
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
