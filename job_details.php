<?php include 'nav.php';
include 'Backend/dbconnect.php';



$id=$_GET['id'];

$sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id WHERE job_posts.id=:id";
  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $job_post=$stmt->fetch(PDO::FETCH_ASSOC);
  // var_dump($job_post);die();
?>

    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2><?= $job_post['position_name'] ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4><?= $job_post['position_name'] ?></h4>
                                    </a>
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i><?= $job_post['location_name'] ?></li>
                                        <li><?= $job_post['salary_amount'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p class="text-justify"><?= $job_post['description'] ?></p>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span><?= date('d M Y',strtotime($job_post['updated_at'])) ?></span></li>
                              <li>Location : <span><?= $job_post['location_name'] ?></span></li>
                              <li>Job nature : <span><?= $job_post['type'] ?></span></li>
                              <li>Salary :  <span><?= $job_post['salary_amount'] ?></span></li>
                              <li>Application date : <span><?= date('d M Y',strtotime("+1 month",strtotime($job_post['updated_at']))) ?></span></li>
                          </ul>
                         <div class="apply-btn2">
                            <a href="#" class="btn">Apply Now</a>
                         </div>
                       </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>
<?php include 'footer.php'; ?>
    