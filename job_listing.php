<?php 
include 'nav.php'; 
include 'Backend/dbconnect.php';

    if (isset($_GET['search'])) {
        $search_data=$_GET['search'];
        $search="%$search_data%";
        $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id WHERE positions.name LIKE :search OR locations.name LIKE :search OR salaries.amount LIKE :search OR job_posts.description LIKE :search OR job_types.type LIKE :search";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':search',$search);
            $stmt->execute();
            $job_posts=$stmt->fetchAll();
            // var_dump($job_posts);die();
    }else{
        $directoryURI = $_SERVER['REQUEST_URI'];
        $path = parse_url($directoryURI, PHP_URL_QUERY);
        if (isset($path)) {
            $components = explode('=', $path);
            $id = $components[1];
            $id_name=$components[0];
            // echo $id;die();
            if ($id && $id_name=='pos_id') {
                $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id WHERE job_posts.position_id=:id";
                    $stmt=$pdo->prepare($sql);
                    $stmt->bindParam(':id',$id);
                    $stmt->execute();
                    $job_posts=$stmt->fetchAll();
            }elseif ($id && $id_name=='type_id') {
                $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id WHERE job_posts.type_id=:id";
                        $stmt=$pdo->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->execute();
                        $job_posts=$stmt->fetchAll();
            }elseif ($id && $id_name=='loc_id') {
                $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id WHERE job_posts.location_id=:id";
                        $stmt=$pdo->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->execute();
                        $job_posts=$stmt->fetchAll();
            }elseif ($id && $id_name=='sal_id') {
                $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id WHERE job_posts.salary_id=:id";
                        $stmt=$pdo->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->execute();
                        $job_posts=$stmt->fetchAll();
            }
        }
        else{
            $sql = "SELECT job_posts.*,positions.name as position_name,locations.name as location_name,salaries.amount as salary_amount,job_types.type as type FROM job_posts INNER JOIN positions ON job_posts.position_id=positions.id INNER JOIN locations ON job_posts.location_id=locations.id INNER JOIN salaries ON job_posts.salary_id=salaries.id INNER JOIN job_types ON job_posts.type_id=job_types.id";
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $job_posts=$stmt->fetchAll();
        }
    }

$sql="SELECT * FROM positions";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$positions=$stmt->fetchAll();

$sql="SELECT * FROM job_types";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$job_types=$stmt->fetchAll();

$sql="SELECT * FROM locations";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$locations=$stmt->fetchAll();

$sql="SELECT * FROM salaries";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$salaries=$stmt->fetchAll();
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
                                <!-- Job Position start -->
                                <div class="select-Categories pt-2 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Position</h4>
                                    </div>
                                    <?php 
                                        foreach ($positions as $position):
                                    ?>
                                    <a href="job_listing.php?pos_id=<?= $position['id'] ?>" class="container"><?= $position['name'] ?>
                                        <input type="radio" <?php if (isset($path) && $id_name=='pos_id' && $position['id']==$id) {
                                           echo "checked";
                                        }?>>
                                        <span class="checkmark"></span>
                                    </a>

                                    <?php 
                                        endforeach;
                                    ?>  
                                </div>
                                <!-- Job Position End -->

                                <!-- Job Type start -->
                                <div class="select-Categories pt-2 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <?php 
                                        foreach ($job_types as $type):
                                    ?>
                                    <a href="job_listing.php?type_id=<?= $type['id'] ?>" class="container"><?= $type['type'] ?>
                                        <input type="radio" <?php if (isset($path) && $id_name=='type_id' && $type['id']==$id) {
                                           echo "checked";
                                        }?>>
                                        <span class="checkmark"></span>
                                    </a>

                                    <?php 
                                        endforeach;
                                    ?>  
                                </div>
                                <!-- Job Type End -->

                                <!-- Job Location start -->
                                <div class="select-Categories pt-2 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Location</h4>
                                    </div>
                                    <?php 
                                        foreach ($locations as $location):
                                    ?>
                                    <a href="job_listing.php?loc_id=<?= $location['id'] ?>" class="container"><?= $location['name'] ?>
                                        <input type="radio" <?php if (isset($path) && $id_name=='loc_id' && $location['id']==$id) {
                                           echo "checked";
                                        }?>>
                                        <span class="checkmark"></span>
                                    </a>

                                    <?php 
                                        endforeach;
                                    ?>  
                                </div>
                                <!-- Job Location End -->

                                <!-- Job Salary start -->
                                <div class="select-Categories pt-2 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Salary</h4>
                                    </div>
                                    <?php 
                                        foreach ($salaries as $salary):
                                    ?>
                                    <a href="job_listing.php?sal_id=<?= $salary['id'] ?>" class="container"><?= $salary['amount'] ?>
                                        <input type="radio" <?php if (isset($path) && $id_name=='sal_id' && $salary['id']==$id) {
                                           echo "checked";
                                        }?>>
                                        <span class="checkmark"></span>
                                    </a>

                                    <?php 
                                        endforeach;
                                    ?>  
                                </div>
                                <!-- Job Salary End -->
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
    