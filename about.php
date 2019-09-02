<?php
    $nav = "";
    $footer = "";
    include("dashboard/config.php");
    $stmt = $connection->prepare("SELECT * FROM cast ORDER BY ID DESC");
    $stmt->execute();
    $cast = $stmt->fetchAll();
    $count_movies = $stmt->rowCount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>About || Movie</title>
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
    
        if(isset($_GET['castID']) && !empty(trim($_GET['castID'])))
        {
            $castID = $_GET['castID'] ;
            $stmt = $connection->prepare("SELECT * FROM cast WHERE ID = ?");
            $stmt->execute(array($castID));
            $about_data = $stmt->fetch();
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
                <div class="celebrety-da details-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="details">
                                <div class="details-movie">
                                    <div class="img">
                                        <img src="<?php echo  $about_data['img'];?>" alt="">
                                    </div>
                                    <div class="content">
                                        <h2 class="name"><?php echo  $about_data['name'];?></h2>
                                        <ul class="info">
                                            <li><span class="name" style="font-size: 14px;margin-right: 10px;">GENDER : </span> <?php echo $about_data['gender'] ;?></li>
                                            <li><span class="name" style="font-size: 14px;margin-right: 10px;">BIRTHDAY  : </span> <?php echo $about_data['gender'] ;?></li>
                                            <li><span class="name" style="font-size: 14px;margin-right: 10px;">JOB  : </span> <?php echo $about_data['gender'] ;?></li>
                                            <li><span class="name" style="font-size: 14px;margin-right: 10px;">PLACE OF BIRTH : </span> <?php echo $about_data['gender'] ;?></li>
                                                                 
                                        </ul>
                                        
                                        <a class="all" href="#">All Movie</a>
                                    </div>
                                </div>
                                <div class="details-content">
                                    <h2 class="title">Discription :</h2>
                                    <p class="text"><?php
                                                                    if (!empty(trim($about_data['details']," ")) or $about_data['details'] != ' ')
                                                                    {
                                                                        ?>
                                                                        <?php echo $about_data['details'] ;?>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        We don't have a biography for <?php echo $about_data['name'];?>.
                                                                        <?php
                                                                    }
                                                                ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                
                
                            <!-- details-tab-area-end -->
                            <div class="movie-tab-area">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="movie-tab">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="lmovie-tab" data-toggle="tab" href="#lmovie" role="tab" aria-controls="lmovie" aria-selected="true"><?php
                                                        if ($about_data['gender'] == 'male')
                                                        {
                                                            echo "His";
                                                        }elseif ($about_data['gender'] == 'Female'){
                                                            echo "Her";
                                                        }
                                                        
                                                        ?>
                                                        Movies</a>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                <?php
                                                
                                                    $stmt = $connection->prepare("SELECT movies.* FROM movies INNER JOIN movies_cast ON movies_cast.movie_id = movies.ID WHERE movies_cast.cast_id = ?");
                                                    $stmt->execute(array($_GET['castID']));
                                                    $rows = $stmt->fetchAll();
                                                ?>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane show active" id="lmovie" role="tabpanel" aria-labelledby="lmovie-tab">
                                                        <div class="tab-carousel owl-carousel">
                                                            <?php
                                                                foreach($rows as $row)
                                                                {
                                                                    ?>
                                                                        <div class="single-top-movie">
                                                                    <div class="img">
                                                                        <a href="movie_details.php?movieID=<?php echo $row['ID'] ; ?>">
                                                                            <img src="<?php echo $row['img_link'] ; ?>" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="view-counter"><?php echo $row['votes_num'] ; ?> Votes</span>
                                                                    <a class="popup-youtube" href="<?php echo $row['trailer'] ; ?>">
                                                                        <i class="far fa-play-circle"></i>
                                                                        </a>
                                                                        <div class="content">
                                                                            <h2 class="name">
                                                                                <a href="movie_details.php?movieID=<?php echo $row['ID'] ; ?>"><?php echo $row['name'] ; ?></a>
                                                                        </h2>
                                                                        <div class="rating clearfix">
                                                                            <div class="star star-on"></div>
                                                                            <?php echo $row['rate'] ; ?>
                                                                        </div>
                                                                        <p class="date"><?php echo $row['released_date'] ; ?></p>
                                                                        <p class="duration"><?php echo $row['duration'] ; ?></p>
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
                                    <h2>Cast Info.</h2>
                                    
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
                                        
                                    </div>
                                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                                        <div class="list-movies">
                                            <?php
                                                
                                                foreach($cast as $data)
                                                {
                                                    ?>
                                                        <div class="single-list-movie">
                                                        <div class="img">
                                                            <img src="<?php echo $data['img'];?>" alt="">
                                                        </div>
                                                        <div class="content">
                                                            <h2 class="name"><?php echo $data['name'];?></h2>
                            
                                                            
                                                            <ul class="info">
                                                    
                                                        
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">GENDER : </span> <?php echo ucwords($data['gender']) ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">BIRTHDAY : </span> <?php echo $data['date'] ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">JOB : </span> <?php echo $data['job'] ;?></li>
                                                                <li><span class="name" style="font-size: 14px;margin-right: 10px;">PLACE OF BIRTH : </span> <?php echo ucwords($data['place']) ;?></li>
                                                                <?php
                                                                    if (!empty(trim($data['details']," ")) or $data['details'] != ' ')
                                                                    {
                                                                        ?>
                                                                        <li><span class="name" style="font-size: 14px;margin-right: 10px;">DETAILS : </span> <?php echo $data['details'] ;?></li>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <li><span class="name" style="font-size: 14px;margin-right: 10px;">DETAILS : </span>We don't have a biography for <?php echo $data['name'];?>.</li>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </ul>
                                                            
                                                            <a class="all" href="about.php?castID=<?php echo $data['ID'];?>">Read More</a>
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