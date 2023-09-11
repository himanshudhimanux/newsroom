<?php 
    get_header();
    $catData = get_queried_object();

    $searchData="";
if($_GET['title'] != ""){
    $searchData= $_GET['title'];
}
?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="<?php echo site_url() ?>">Home</a>
                <span class="breadcrumb-item active"><?php echo $catData->name; ?></span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0"><?php echo $catData->name; ?></h3>
                            </div>
                        </div>


                        <!-- ============= News Slider ==========  -->

                        <?php 

                            $wpnews = array(
                                'post_type'=>'news',
                                'post_status'=>'publish',
                                's'=>$searchData,
                                'tax_query'=> array(
                                    array(
                                        'taxonomy'=>'news-category',
                                    'field'=>'term_id',
                                    'terms'=>$catData->term_id
                                    )
                                )
                            );

                            $newsquery = new WP_Query($wpnews);

                            while($newsquery->have_posts()){
                                $newsquery->the_post();

                            $image = wp_get_attachment_image_src(
                                get_post_thumbnail_id(),'large'
                            );

                                
                            ?>

                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="<?php echo  $image[0] ?>" style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a href=""><?php echo $catData->name; ?></a>
                                            <span class="px-1">/</span>
                                            <span><?php echo get_the_date(); ?></span>
                                        </div>
                                        <a class="h4" href=""><?php the_title(); ?></a>
                                        <p class="m-0"><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        <!-- ========== News Slider ==========  -->
                            
                    </div>
  
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                              <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                  <a class="page-link" href="#" aria-label="Previous">
                                    <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Next">
                                    <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">

                    <div class="input-group ml-auto " style="width: 100%; max-width: 100%; margin-bottom:30px;">
                        <form class="d-flex align-items-center" method="get" style="width: 100%">
                            <input type="text" class="form-control py-4" name="title" value="<?php echo $_GET['title']; ?>" placeholder="Search News">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text text-secondary p-3"><i
                                    class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <!-- Social Follow Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Follow Us</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                                <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                                <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
                                <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                                <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                                <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
                                <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->

<?php 
    get_footer()
?>
