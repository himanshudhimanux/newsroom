<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">   

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo get_template_directory_uri(); ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
</head>

<?php
// Get the current date and time
$current_date_time = current_time('mysql');

// Convert the date and time to a PHP DateTime object
$current_date = new DateTime($current_date_time);

// Get the day, month, date, and year
$current_day = $current_date->format('l'); // Day of the week (e.g., Monday)
$current_month = $current_date->format('F'); // Full month name (e.g., August)
$current_date_number = $current_date->format('d'); // Day of the month as a two-digit number (e.g., 04)
$current_year = $current_date->format('Y'); // Four-digit year (e.g., 2023)

?>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Trending News</div>

                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 150px); padding-left: 90px;">
                        
                            <?php 

                            $wpnews = array(
                                'post_type'=>'news',
                                'post_status'=>'publish',
                                
                            );

                            $newsquery = new WP_Query($wpnews);

                            while($newsquery->have_posts()){
                                $newsquery->the_post();

                            $image = wp_get_attachment_image_src(
                                get_post_thumbnail_id(),'large'
                            );

                                
                            ?>

                                <div class="text-truncate">
                                    <a class="text-secondary" href="">
                                        <?php the_title(); ?>
                                    </a>
                                </div>

                            <?php } ?>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
               <?php echo $current_day?>, <?php echo $current_month ?> <?php echo $current_date_number ?>, <?php echo $current_year ?>
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="img/ads-700x70.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                
                    <?php
                        wp_nav_menu(
                            array('theme_location'=>'primary-menu')
                        )
                    ?>

                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar End -->