<?php

    $nav = "";
    $footer = "";


include("dashboard/config.php");
function getMoviesNews ($key)
        {
            $d=strtotime("yesterday");
            $url = 'https://newsapi.org/v2/everything?q=' . $key . '&from=' . date("Y-m-d", $d) . '&sortBy=popularity&apiKey=de294a29fc224491ad5959f857c5c7f7';
            $data= json_decode(file_get_contents($url));
            return $data;
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Home || Movie</title>
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
    <!-- header-start -->
    <!-- slider-area-start -->
    <div class="slider-area slider-carousel owl-carousel">
        <?php
        $stmt = $connection->prepare("SELECT * FROM movies ORDER BY ID DESC LIMIT 4");
        $stmt->execute();
        $movies_head = $stmt->fetchAll();
        foreach($movies_head as $movie)
        {
            ?>
            <div class="slider-box">
                <div class="img"style="height: 750px;width: 1920px;">
                    <img src="<?php echo $movie['img_link'];?>" alt="">
                </div>
                <div class="content">
                    <div class="sb-content-box">
                        <h3 class="intro animated">NOW AVAILABLE</h3>
                        <h2 class="title animated"><?php echo $movie['name'];?></h2>
                        <p class="text animated d-none d-md-block"><?php echo $movie['details'];?></p>
                        <div class="buttons">
                            <a class="button hvr-bs animated" href="movie_details.php?movieID=<?php echo $movie['ID'];?>">Read More</a>
                            <a class="button hvr-bs animated" href="<?php echo $movie['trailer'];?>" target="_blank">Watch Trailaer</a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <?php
            
            
        }
        
        
        ?>
        
    </div>
    <!-- slider-area-end -->
    <!-- top-movie-area-start -->
    <?php
        $stmt = $connection->prepare("SELECT * FROM movies ORDER BY rate DESC LIMIT 4");
        $stmt->execute();
        $row = $stmt->fetchAll();
    ?>
    <div class="top-movie-area">
        <div class="container">
            <div class="top-movie-carousel owl-carousel">
                <?php
                //print_r($row);die;
                    foreach($row as $rows)
                    {
                        $stmt = $connection->prepare("SELECT * FROM server WHERE movie_id = ? AND statues = 1 LIMIT 1");
                        $stmt->execute(array($rows['ID']));
                        $movie_data = $stmt->fetch();
                        
                        ?>
                            <div class="single-top-movie">
                            <div class="img">
                                <a href="movie_details.php?movieID=<?php echo $rows['ID'] ; ?>">
                                    <img src="<?php echo $rows['img_link'] ; ?>" alt="">
                                </a>
                            </div>
                            <span class="view-counter"><?php echo $movie_data['quality'] ; ?></span>
                            <a class="popup-youtube" href="<?php echo $rows['trailer'] ; ?>">
                                <i class="far fa-play-circle"></i>
                            </a>
                            <div class="content">
                                <h2 class="name">
                                    <a href="movie_details.php?movieID=<?php echo $rows['ID'] ; ?>"><?php echo $rows['name'] ; ?></a>
                                </h2>
                                <div class="rating clearfix">
                                    <div class="star star-on"></div>
                                    <?php echo $rows['rate'] ; ?>
                                </div>
                                <p class="date"><?php echo $rows['released_date'] ; ?></p>
                                
                                <p class="duration"><?php echo $rows['duration'] ; ?></p>
                            </div>
                        </div>
                        
                        
                        
                        <?php
                        
                        
                        
                    }
                
                
                ?>
                
                
            </div>
        </div>
    </div>
    <!-- top-movie-area-end -->
    <!-- upcoming-movie-area-start -->
    <!--<div class="upcoming-movie-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Upcomming Movies</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="upcoming-movie-feature">
                        <div class="umf-single single-top-movie">
                            <div class="img">
                                <a href="04_movie-details.html">
                                    <img src="img/home1/upcoming-b-1.jpg" alt="">
                                </a>
                            </div>
                            <span class="view-counter">759k Views</span>
                            <a class="popup-youtube" href="https://www.youtube.com/watch?v=6ZfuNTqbHE8">
                                <i class="far fa-play-circle"></i>
                            </a>
                            <div class="content">
                                <h2 class="name">
                                    <a href="04_movie-details.html">Jecu Jek English Horor Movie Lorem Ipsum is there fore always free from.</a>
                                </h2>
                                <div class="rating clearfix">
                                    <div class="star star-on"></div>
                                    <div class="star star-on"></div>
                                    <div class="star star-on"></div>
                                    <div class="star star-on"></div>
                                    <div class="star star-half"></div>
                                </div>
                                <p class="date">October 26, 2018</p>
                                <p class="duration">02 :50 :12</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="upcoming-movie-small ums-carousel owl-carousel">
                        <div class="ums-all">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Sport Life</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Love War 5</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Fire Sermon</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Fish Warehouse</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ums-all">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Sport Life</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Love War 5</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Fire Sermon</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Fish Warehouse</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ums-all">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Sport Life</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Love War 5</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Fire Sermon</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                    <div class="ums-single single-top-movie">
                                        <div class="img">
                                            <a href="04_movie-details.html">
                                                <img src="img/home1/upcoming-s-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <span class="view-counter">125k Views</span>
                                        <div class="content">
                                            <h2 class="name">
                                                <a href="04_movie-details.html">Fish Warehouse</a>
                                            </h2>
                                            <div class="rating clearfix">
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-on"></div>
                                                <div class="star star-half"></div>
                                            </div>
                                            <p class="date">October 26, 2018</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- upcoming-movie-area-end -->
    <!-- movie-tab-area-start -->
    <div class="movie-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="movie-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="lmovie-tab" data-toggle="tab" href="#lmovie" role="tab" aria-controls="lmovie" aria-selected="true">Letest Movies</a>
                            </li>
                            
                            
                        </ul>
                        <?php
                            $stmt = $connection->prepare("SELECT * FROM movies ORDER BY ID DESC");
                            $stmt->execute();
                            $rows = $stmt->fetchAll();
                        ?>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active" id="lmovie" role="tabpanel" aria-labelledby="lmovie-tab">
                                <div class="tab-carousel owl-carousel">
                                    <?php
                                        foreach($rows as $row)
                                        {
                                            $stmt = $connection->prepare("SELECT * FROM server WHERE movie_id = ? AND statues = 1 LIMIT 1");
                                            $stmt->execute(array($row['ID']));
                                            $movie_data = $stmt->fetch();
                                            ?>
                                                <div class="single-top-movie">
                                            <div class="img">
                                                <a href="movie_details.php?movieID=<?php echo $row['ID'] ; ?>">
                                                    <img src="<?php echo $row['img_link'] ; ?>" alt="">
                                                </a>
                                            </div>
                                            <span class="view-counter"><?php echo $movie_data['quality'] ; ?></span>
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
    <!-- movie-tab-area-end -->
    <!-- movie-tab-area-start -->
    <div class="movie-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="movie-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="lmovie-tab" data-toggle="tab" href="#lmovie" role="tab" aria-controls="lmovie" aria-selected="true">BlueRay Movies</a>
                            </li>
                            
                            
                        </ul>
                        <?php
                            $stmt = $connection->prepare("SELECT * FROM movies ORDER BY ID DESC");
                            $stmt->execute();
                            $rows = $stmt->fetchAll();
                        ?>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active" id="lmovie" role="tabpanel" aria-labelledby="lmovie-tab">
                                <div class="tab-carousel owl-carousel">
                                    <?php
                                        foreach($rows as $row)
                                        {
                                            $stmt = $connection->prepare("SELECT * FROM server WHERE movie_id = ? AND statues = 1 LIMIT 1");
                                            $stmt->execute(array($row['ID']));
                                            $movie_data = $stmt->fetch();
                                            if ($movie_data['quality'] == 'BlueRay')
                                            {
                                                ?>
                                                <div class="single-top-movie">
                                            <div class="img">
                                                <a href="movie_details.php?movieID=<?php echo $row['ID'] ; ?>">
                                                    <img src="<?php echo $row['img_link'] ; ?>" alt="">
                                                </a>
                                            </div>
                                            <span class="view-counter"><?php echo $movie_data['quality'] ; ?></span>
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
    <!-- movie-tab-area-end -->
    <!-- about-movie-area-start -->
    <div class="about-movie-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>About This Movie</h2>
                    </div>
                </div>
            </div>
            <div class="about-movie-carousel owl-carousel">
                <?php
                $stmt = $connection->prepare("SELECT * FROM movies");
                $stmt->execute();
                $movie_det = $stmt->fetchAll();
                
                
                
                    foreach($movie_det as $detail)
                    {
                        $stmt = $connection->prepare("SELECT * FROM cast JOIN movies_cast ON movies_cast.cast_id = cast.ID WHERE movies_cast.movie_id = ?");
                        $stmt ->execute(array($detail['ID']));
                        $cast_Info = $stmt->fetchAll();
                        ?>
                            <div class="single-about-movie">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                    <div class="banner">
                                        <img src="<?php echo $detail['img_link']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                    <div class="content">
                                        <h2 class="title"><?php echo $detail['name']; ?></h2>
                                        <p class="text"><?php echo $detail['details']; ?>
                                        </p>
                                        <h3>Cast</h3>
                                        <?php
                                            foreach($cast_Info as $info)
                                            {
                                                echo '<div class="col-md-6">- ' . $info['name'] . '</div>';
                                            }
                                        
                                        ?>
                                        <a class="more" href="movie_details.php?movieID=<?php echo $detail['ID'] ; ?>">Read More</a>
                                    </div>
                                </div>
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
    <!-- about-movie-area-end -->
    
    <!-- news-area-start -->
    <div class="news-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Letest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    foreach(array_slice(getMoviesNews ("marvel")->articles,0,1) as $data)
                    {
                        ?>
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="feature-news">
                                <div class="single-news">
                                    <div class="img">
                                        <img src="<?php echo $data->urlToImage; ?>" alt="" style="height: 700px;">
                                    </div>
                                    <div class="content">
                                        
                                        <h2 class="title">
                                            <a href="<?php echo $data->url; ?>" target="_Blank"><?php echo $data->title; ?></a>
                                        </h2>
                                        <p class="text"><?php echo $data->description; ?></p>
                                        <div class="meta-more">
                                            <a class="more" href="<?php echo $data->url; ?>" target="_Blank">Read More</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="news-carousel owl-carousel">
                                <div class="all-small-news">
                        <?php
                        
                    }
                    
                    foreach(array_slice(getMoviesNews ("marvel")->articles,1,2) as $data)
                    {
                        ?>
                            
                                    <div class="single-news">
                                        <div class="img">
                                            <img src="<?php echo $data->urlToImage; ?>" alt="">
                                        </div>
                                        <div class="content">
                                            <h2 class="title">
                                                <a href="<?php echo $data->url; ?>" target="_Blank"><?php echo $data->title; ?></a>
                                            </h2>
                                            <div class="meta-more">
                                                <a class="more" href="<?php echo $data->url; ?>" target="_Blank">Read More</a>
                                                
                                            </div>
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
    <!-- news-area-end -->
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