<?php
    $nav = "";
    $footer = "";
    include("dashboard/config.php");
    $stmt = $connection->prepare("SELECT * FROM movies");
    $stmt->execute();
    $movies = $stmt->fetchAll();
    $count_movies = $stmt->rowCount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Feature Movie List || Movie</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/plyr.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/slicknav.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="jquery-3.4.1.min.js"></script>
        <![endif]-->

</head>

<body>
    <div id="preloader"></div>
    <!-- header-start -->
    <?php
        if (isset($nav))
        {
            include("nav.php");
        }
    ?>

    <?php
        $do = "";
        if (isset($_GET['do']))
        {
            $do = $_GET['do'];
        }else{
            $do = "";
        }
    
        if ($do == 'search_movie')
        {
            $searchq = $_GET['searchq'] . "+";
            $searchq = str_replace("+"," ",$searchq);
            //print_r($searchq);
            $searchq = trim($searchq," ");
            $searchQ = "%". $searchq . "%";
            //print_r($searchQ);
            $stmt = $connection->prepare("SELECT * FROM movies WHERE name LIKE ?");
            $stmt->execute(array($searchQ));
            $search_data = $stmt->fetchAll();
            //print_r($search_data);
            $count = $stmt->rowCount();
            
            if ($count == 0 )
            {
                ?>
                    <div class="feature-movie-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="grid-menu d-flex justify-content-between">
                                    No result.
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <?php
            }elseif($count > 0){
                ?>
                <div class="feature-movie-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    
                                        
                                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                                        <div class="list-movies">
                                            <?php
                                                
                                                foreach($search_data as $movie)
                                                {
                                                    ?>
                                                        <div class="single-list-movie">
                                                        <div class="img">
                                                            <img src="<?php echo $movie['img_link'];?>" alt="">
                                                        </div>
                                                        <div class="content">
                                                            <h2 class="name"><?php echo $movie['name'];?></h2>
                                                            <div class="reviews">
                                                                <div class="rating clearfix">
                                                                    <div class="star star-on"></div>
                                                                    <?php echo $movie['rate'];?>
                                                                </div>
                                                                <p class="review">(<?php echo $movie['votes_num'];?> Reviews(S))</p>
                                                            </div>
                                                            <?php
                                                                $movie_id = $movie['ID'];
                                                                $stmt = $connection->prepare("SELECT * FROM cast JOIN movies_cast ON movies_cast.cast_id = cast.ID WHERE movies_cast.movie_id = ?");
                                                                $stmt ->execute(array($movie_id));
                                                                $cast_Info = $stmt->fetchAll();
                                                            
                                                            ?>
                                                            <ul class="info">
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">ACTOR : </span>
                                                                <?php
                                                                foreach($cast_Info as $cast)
                                                                {
                                                                    ?>
                                                                        <?php echo $cast['name'] . ",";?>
                                                                    <?php
                                                                }
                                                                
                                                                ?>
                                                                </li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">GENRE : </span> <?php echo $movie['type'] ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">RELEASE : </span> <?php echo $movie['released_date'] ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">LANGUAGE : </span> <?php echo ucwords($movie['movie_lang']) ;?></li>
                                                            </ul>
                                                            
                                                            <a class="all" href="movie_details.php?movieID=<?php echo $movie['ID'];?>">Watch | Download</a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            
                                            
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                <?php
            }
            
        }elseif($do == 'search_cast')
        {
            $searchq = $_GET['searchq'] . "+";
            $searchq = str_replace("+"," ",$searchq);
            //print_r($searchq);
            $searchq = trim($searchq," ");
            $searchQ = "%". $searchq . "%";
            //print_r($searchQ);
            $stmt = $connection->prepare("SELECT DISTINCT * FROM cast WHERE name LIKE ?");
            $stmt->execute(array($searchQ));
            $search_data = $stmt->fetchAll();
            //print_r($search_data);
            $count = $stmt->rowCount();
            
            if ($count == 0 )
            {
                ?>
                    <div class="feature-movie-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="grid-menu d-flex justify-content-between">
                                    No result.
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <?php
            }elseif($count > 0){
                ?>
                <div class="feature-movie-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    
                                        
                                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                                        <div class="list-movies">
                                            <?php
                                                
                                                foreach($search_data as $cast)
                                                {
                                                    ?>
                                                        <div class="single-list-movie">
                                                        <div class="img">
                                                            <img src="<?php echo $cast['img'];?>" alt="">
                                                        </div>
                                                        <div class="content">
                                                            <h2 class="name"><?php echo $cast['name'];?></h2>
                            
                                                            
                                                            <ul class="info">
                                                    
                                                        
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">GENDER : </span> <?php echo ucwords($cast['gender']) ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">BIRTHDAY : </span> <?php echo $cast['date'] ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">JOB : </span> <?php echo $cast['job'] ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">PLACE OF BIRTH : </span> <?php echo ucwords($cast['place']) ;?></li>
                                                                <?php
                                                                    if (!empty(trim($cast['details']," ")) or $cast['details'] != ' ')
                                                                    {
                                                                        ?>
                                                                        <li><span class="name" style="font-size: 14px;margin-right: 10px;">DETAILS : </span> <?php echo $cast['details'] ;?></li>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <li><span class="name" style="font-size: 14px;margin-right: 10px;">DETAILS : </span>We don't have a biography for <?php echo $cast['name'];?>.</li>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </ul>
                                                            
                                                            <a class="all" href="about.php?castID=<?php echo $cast['ID'];?>">Read More</a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            
                                            
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                <?php
        }
        }
        else{
            ?>
                <!-- feature-movie-area-start -->
                <div class="feature-movie-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="grid-menu d-flex justify-content-between">
                                    <div class="tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#grid" role="tab" aria-selected="true">
                                                    <i class="fa fa-th-large"></i>
                                                </a>
                                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#list" role="tab" aria-selected="false">
                                                    <i class="fa fa-list-ul"></i>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                    
                                    <!--<div class="sort-show" id="sort" name="sort">
                                        <select>
                                            <option>Sort by</option>
                                            <option value="ID">Latest</option>
                                            <option value="rate">Rate</option>
                                            
                                        </select>
                                        
                                        
                                    </div>-->
                                    
                                    <!--<div class="pages">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="active" href="#">1</a>
                                            </li>
                                            <li>
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade" id="grid" role="tabpanel">
                                        <div class="grid-movies">
                                            <div class="row" id="movies">
                                                <?php
                                                    foreach($movies as $movie)
                                                    {
                                                        ?>
                                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                            <div class="single-top-movie">
                                                                <div class="img">
                                                                    <a href="#">
                                                                        <img src="<?php echo $movie['img_link'];?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <span class="view-counter"><?php echo $movie['votes_num'];?> Votes</span>
                                                                <a class="popup-youtube" href="<?php echo $movie['trailer'];?>">
                                                                    <i class="far fa-play-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <h2 class="name">
                                                                        <a href="movie_details.php?movieID=<?php echo $movie['ID'];?>""><?php echo $movie['name'];?></a>
                                                                    </h2>
                                                                    <div class="rating clearfix">
                                                                        <div class="star star-on"></div>
                                                                        <?php echo $movie['rate'];?>
                                                                    </div>
                                                                    <p class="date"><?php echo $movie['released_date'];?></p>
                                                                    <p class="duration"><?php echo $movie['duration'];?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                                        <div class="list-movies">
                                            <?php
                                                
                                                foreach($movies as $movie)
                                                {
                                                    ?>
                                                        <div class="single-list-movie">
                                                        <div class="img">
                                                            <img src="<?php echo $movie['img_link'];?>" alt="">
                                                        </div>
                                                        <div class="content">
                                                            <h2 class="name"><?php echo $movie['name'];?></h2>
                                                            <div class="reviews">
                                                                <div class="rating clearfix">
                                                                    <div class="star star-on"></div>
                                                                    <?php echo $movie['rate'];?>
                                                                </div>
                                                                <p class="review">(<?php echo $movie['votes_num'];?> Reviews(S))</p>
                                                            </div>
                                                            <?php
                                                                $movie_id = $movie['ID'];
                                                                $stmt = $connection->prepare("SELECT * FROM cast JOIN movies_cast ON movies_cast.cast_id = cast.ID WHERE movies_cast.movie_id = ?");
                                                                $stmt ->execute(array($movie_id));
                                                                $cast_Info = $stmt->fetchAll();
                                                            
                                                            ?>
                                                            <ul class="info">
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">ACTOR : </span>
                                                                <?php
                                                                foreach($cast_Info as $cast)
                                                                {
                                                                    ?>
                                                                        <?php echo $cast['name'] . ",";?>
                                                                    <?php
                                                                }
                                                                
                                                                ?>
                                                                </li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">GENRE : </span> <?php echo $movie['type'] ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">RELEASE : </span> <?php echo $movie['released_date'] ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">LANGUAGE : </span> <?php echo ucwords($movie['movie_lang']) ;?></li>
                                                            </ul>
                                                            
                                                            <a class="all" href="movie_details.php?movieID=<?php echo $movie['ID'];?>">Watch | Download</a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            
                                            
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            
            <?php
        }
    
    
    
    ?>
    <!-- feature-movie-area-end -->
    <!-- footer-start -->
    
    <?php
        if (isset($footer))
        {
            include("footer.php");
        }
    ?>
    <!-- footer-end -->
    <!-- Scripts -->
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/amplitude.js"></script>
    <script src="js/plyr.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.scrollUp.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>