<?php 
    include 'nav.php'; 
    include 'Backend/dbconnect.php';

    $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id LIMIT 5";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $job_posts=$stmt->fetchAll();

    $sql="SELECT * FROM positions";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $positions=$stmt->fetchAll();
?>
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="Frontend/assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find the most exciting startup jobs</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- form -->
                                <form action="job_listing.php">
                                    
                                        <input type="text" placeholder="Job Tittle or keyword" class="form-control w-50 d-inline" style="height: 55px" name="search">
                                        <input type="submit" class="btn btn-outline-danger" value="Find JOBS" name="">
                                    	
                                </form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->
        <div class="our-services section-pad-t30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>FEATURED TOURS Packages</span>
                            <h2>Browse Top Positions </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    <?php  
                        foreach ($positions as $position):
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <img src="Backend/<?= $position['photo'] ?>" width="60" height="61">
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.php?pos_id=<?= $position['id'] ?>"><?= $position['name'] ?></a></h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="job_listing.php" class="border-btn2">Browse All Sectors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
         <!-- <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">FEATURED TOURS Packages</p>
                            <p class="pera2"> Make a Difference with Your Online Resume!</p>
                            <a href="#" class="border-btn2 border-btn4">Upload your cv</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Online CV Area End-->
        <!-- Featured_job_start -->
        <section class="featured-job-area">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Recent Job</span>
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <?php  
                                    foreach ($job_posts as $job_post):
                                ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="job-tittle job-tittle2">
                                            <a href="job_details.php?id=<?= $job_post['id'] ?>">
                                                <h4><?= $job_post['position_name'] ?></h4>
                                            </a>
                                            <ul>
                                                <li><i class="fas fa-map-marker-alt"></i><?= $job_post['location_name'] ?></li>
                                                <li><?= $job_post['salary_amount'] ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <span class="py-3 text-center"><?= $job_post['type'] ?></span>
                                        <a href="job_details.php?id=<?= $job_post['id'] ?>">Detail</a>
                                    </div>
                                </div>
                                <?php 
                                    endforeach;
                                ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
        <!-- How  Apply Process Start-->
        <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <span>Apply process</span>
                            <h2> How it works</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="process-cap">
                               <h5>1. Search a job</h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-curriculum-vitae"></span>
                            </div>
                            <div class="process-cap">
                               <h5>2. Apply for job</h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="process-cap">
                               <h5>3. Get your job</h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
        
        <!-- Testimonial End -->
    </main>
   <?php include 'footer.php'; ?>