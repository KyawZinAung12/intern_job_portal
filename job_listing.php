<?php 
include 'nav.php'; 
include 'Backend/dbconnect.php';

    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_QUERY);

    if (isset($path)) {
        $components = explode('=', $path);
        $id = $components[1];
        $id_name=$components[0];
        // echo $route;die();
        if ($id && $id_name=='pos_id') {
            $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id WHERE job_posts.position_id=:id";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':id',$id);
                $stmt->execute();
                $job_posts=$stmt->fetchAll();
        }
    }else{
            $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id";
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $job_posts=$stmt->fetchAll();
        }




$sql="SELECT * FROM positions";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$positions=$stmt->fetchAll();
//var_dump($job_posts);die();

?>

    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4 class="text-monospace">Job Filter</h4>
                               </div>
                               <hr>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-2 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <?php 
                                        foreach ($positions as $position):
                                    ?>
                                    <a href="job_listing.php?pos_id=<?= $position['id'] ?>" class="container"><?= $position['name'] ?>
                                        <input type="radio" <?php if (isset($path)) { if ($position['id']==$id) {
                                           echo "checked";
                                        }else{echo "";} }?>>
                                        <span class="checkmark"></span>
                                    </a>

                                    <?php 
                                        endforeach;
                                    ?>
                                    
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Location</h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="select">
                                        <option value="">Anywhere</option>
                                        <option value="">Category 1</option>
                                        <option value="">Category 2</option>
                                        <option value="">Category 3</option>
                                        <option value="">Category 4</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Experience</h4>
                                    </div>
                                    <label class="container">1-2 Years
                                        <input type="checkbox" >
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">2-3 Years
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">3-6 Years
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">6-more..
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single three -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Posted Within</h4>
                                    </div>
                                    <label class="container">Any
                                        <input type="checkbox" >
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Today
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 2 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 3 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 5 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 10 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <div class="single-listing">
                                <!-- Range Slider Start -->
                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                    <div class="small-section-tittle2">
                                        <h4>Filter Jobs</h4>
                                    </div>
                                    <div class="widgets_inner">
                                        <div class="range_item">
                                            <!-- <div id="slider-range"></div> -->
                                            <input type="text" class="js-range-slider" value="" />
                                            <div class="d-flex align-items-center">
                                                <div class="price_text">
                                                    <p>Price :</p>
                                                </div>
                                                <div class="price_value d-flex justify-content-center">
                                                    <input type="text" class="js-input-from" id="amount" readonly />
                                                    <span>to</span>
                                                    <input type="text" class="js-input-to" id="amount" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                              <!-- Range Slider End -->
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                
                                <!-- single-job-content -->
                                <?php  
                                    foreach ($job_posts as $job_post):
                                ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="#">
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
                                        <a href="job_details.html">Detail</a>
                                    </div>
                                </div>
                                <?php 
                                    endforeach;
                                ?>
                                
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
        
    </main>
<?php include 'footer.php'; ?>
    