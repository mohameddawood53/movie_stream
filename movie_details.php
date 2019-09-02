<?php
    $nav = "";
    $footer = "";
    include("dashboard/config.php");
    $movie_id = $_GET['movieID'];
    $stmt = $connection->prepare("SELECT * FROM movies WHERE ID = ?");
    $stmt->execute(array($movie_id));
    $movie_det = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Movie Details || <?php echo $movie_det['name'] ;?></title>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <![endif]-->
        <style>
            .dba-left-single {
                
                height: 500px;
                width: 1000px;
                margin-top: -439px;
            }
            .single-top-movie .img {
            max-width: 100%;
            height: 500px;
            width: 1000px;
        }
        .single-top-movie::after{
            height: 563px;
        }
        
        </style>
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
        
        function getVideoID($url)
        {
            $queryString = parse_url($url,PHP_URL_QUERY);
            parse_str($queryString,$item);
            if(isset($item['v']) && strlen($item['v']) > 0)
            {
                return $item['v'];
            }
            else{
                return "";
            }
        }
        $apiKey = "AIzaSyDCUpKzoELms_nUDtLlFzCV8MZBLCeYp14";
        $apiURL = "https://www.googleapis.com/youtube/v3/videos?id=" . getVideoID($movie_det['trailer']) ."&key=" . $apiKey . "&part=snippet,contentDetails,statistics,status";
        $data   = json_decode(file_get_contents($apiURL));
        $thumbLink = "https://i.ytimg.com/vi/" . getVideoID($movie_det['trailer']) . "/maxresdefault.jpg";
        $countViews =number_format($data->items[0]->statistics->viewCount);
    
    
    ?>
    <!-- header-start -->
        <div class="slider-area slider-carousel owl-carousel">
        <div class="slider-box">
            
            <div class="img"style="height: 750px;width: 1920px; background-position : center;">
                <img src="<?php echo $movie_det['img_link'];?>" style="overflow:hidden;margin-top: -150px;" alt="">
            </div>
            <div class="content">
                <div class="sb-content-box">
                    
                    


                </div>
            </div>
        </div>
        
    </div>
    <!-- other-page-breadcumb-area-start -->
    <div class="top-movie-area">
    <div class="container">
    <div class="other-page-breadcumb-area bg-with-ebony">
           <!-- details-banner-area-start -->
    
    <div class="details-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-12 col-12">
                    <center>
                        <div class="dba-left-single umf-single single-top-movie">
                        <div class="img">
                                <img src="<?php echo $thumbLink ; ?>" alt="">
                        </div>
                        <span class="view-counter"><?php echo $countViews ; ?> Views</span>
                        <a class="popup-youtube" href="<?php echo $movie_det['trailer'] ; ?>">
                            <i class="far fa-play-circle"></i>
                        </a>
                        
                    </div>
                    </center>
                </div>
                <!--<div class="col-lg-3 col-sm-12 col-12">
                    <div class="dba-right">
                        <h2 class="title">Releted Movies</h2>
                        <div class="dba-right-carousel owl-carousel">
                            <?php
                                //$stmt = $connection->prepare("SELECT * FROM movies");
                                //$stmt->execute();
                                //$movies = $stmt->fetchAll();
                                //$count = 1;
                                //print_r($movies)
                                //foreach($movies as $movie)
                                {
                                    //if ($count % 2 == 1)
                                    //{
                                    ?>
                                    <div class="dbarc-item">
                                        <div class="dba-right-single ums-single single-top-movie">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="<?php /*echo $movie['img_link'];*/ ?>" alt="">
                                                </a>
                                            </div>
                                            <span class="view-counter"><?php /*echo $movie['votes_num'];*/ ?> Votes</span>
                                            <div class="content">
                                                <h2 class="name">
                                                    <a href="#"><?php /*echo $movie['name'];*/ ?></a>
                                                </h2>
                                                <p class="date"><?php /*echo $movie['released_date'];*/ ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    //}else{
                                      ?>
                                        <div class="dba-right-single ums-single single-top-movie">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="img/details/related-movie-s-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <span class="view-counter">125k Views</span>
                                            <div class="content">
                                                <h2 class="name">
                                                    <a href="#">Gitter Horror Movie</a>
                                                </h2>
                                                <p class="date">October 26, 2018</p>
                                            </div>
                                        </div>
                                    </div>
                                      
                                      
                                      
                                    <?php
                                      
                                      
                                        
                                    //}
                                    
                                        
                                    
                                    
                                    
                                }
                            
                            
                            ?>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- other-page-breadcumb-area-end -->

    <!-- details-banner-area-end -->
    <!-- details-area-start -->
    <div class="details-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="details">
                        <div class="details-movie">
                            <div class="img">
                                <img src="<?php echo $movie_det['img_link']; ?>" alt="">
                            </div>
                            <div class="content">
                                <h2 class="name">Many Info.</h2>
                                <div class="reviews">
                                    <div class="rating clearfix">
                                        <div class="star star-on"></div>
                                        <?php echo $movie_det['rate']; ?>
                                    </div>
                                    <p class="review">(<?php echo $movie_det['votes_num']; ?> Vote(S))</p>
                                </div>
                                <?php
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
                                    <li><span class="name" style="font-size: 14px;margin-right: 10px;">GENRE : </span> <?php echo $movie_det['type'] ;?></li>
                                    <li><span class="name" style="font-size: 14px;margin-right: 10px;">RELEASE : </span> <?php echo $movie_det['released_date'] ;?></li>
                                    <li><span class="name" style="font-size: 14px;margin-right: 10px;">LANGUAGE : </span> <?php echo ucwords($movie_det['movie_lang']) ;?></li>
                                </ul>
                                <!--<div class="share">
                                    <span class="label">Share:</span>
                                    <ul class="social">
                                        <li class="facebook">
                                            <a href="#" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="#" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="pinterest">
                                            <a href="#" target="_blank">
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                        <li class="vimeo">
                                            <a href="#" target="_blank">
                                                <i class="fab fa-vimeo-v"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>-->
                                <a class="all" href="movies.php">All Movies</a>
                            </div>
                        </div>
                        <div class="details-content">
                            <h2 class="title">Discription :</h2>
                            <p class="text"></br><?php echo $movie_det['details'] ;?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- details-area-end -->
    <!-- details-tab-area-start -->
    <div class="details-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="details-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="comments-tab" data-toggle="tab" href="#stream" role="tab" aria-controls="stream" aria-selected="true">Streaming</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="review-tab" data-toggle="tab" href="#download" role="tab" aria-controls="download" aria-selected="false">Download</a>
                            </li>
                        </ul>
                        <?php
                            $stmt = $connection->prepare("SELECT link FROM server WHERE movie_id = ? AND statues = 1");
                            $stmt->execute(array($movie_id));
                            $link_stream = $stmt->fetch();
                        ?>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="stream" role="tabpanel" aria-labelledby="comments-tab">
                                <div class="details-tab-box">
                                    <iframe src="<?php echo $link_stream['link'];?>"class="embed-responsive-item" height="600" width="1060"allowfullscreen></iframe>
                                </div>
                            </div>
                            <?php
                            $stmt = $connection->prepare("SELECT * FROM server WHERE movie_id = ? AND statues = 2");
                            $stmt->execute(array($movie_id));
                            $link_down = $stmt->fetchAll();
                            ?>
                            <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="review-tab">
                                <div class="details-tab-box">
                                    <?php
                                        foreach($link_down as $download)
                                        {
                                            ?>
                                            <a href="<?php echo $download['link'];?>" class="btn btn-success" >Download | <?php echo $download['quality'];?></a>
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
    <!-- details-tab-area-end -->
    <div class="movie-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="movie-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="lmovie-tab" data-toggle="tab" href="#lmovie" role="tab" aria-controls="lmovie" aria-selected="true">Related Movies</a>
                            </li>
                            
                            
                        </ul>
                        <?php
                            $lang = $movie_det['movie_lang'];
                            $id = $movie_det['ID'];
                            $stmt = $connection->prepare("SELECT * FROM movies WHERE movie_lang = ? AND ID != ?");
                            $stmt->execute(array($lang,$id));
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