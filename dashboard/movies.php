<?php
    ob_start();
    session_start();
    include("config.php");
    $navbar = "";
    $pageTitle = "Dashboard | Movies ";
    $slider = "";
    if (isset($_SESSION['loggedin']))
    {
        $stmt = $connection->prepare("SELECT movies.ID,movies.name,movies.type,movies.rate,movies.movie_lang,users.username FROM movies,users WHERE movies.user_id = users.id ORDER BY movies.ID DESC");
        $stmt->execute();
        $rows  = $stmt->fetchAll();
        ?>
            <!DOCTYPE HTML>
        <html>
        <head>
        <title><?php echo $pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <!-- Custom Theme files -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <!--js-->
        <script src="js/jquery-2.1.1.min.js"></script> 
        <!--icons-css-->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!--Google Fonts-->
        <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
        <!--static chart-->
        <script src="js/Chart.min.js"></script>
        <!--//charts-->
        <!-- geo chart -->
            <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
            <!--<script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>-->
            
      </head>
        <body>	
        <?php
                if (isset($navbar))
                {
                        include("nav.php");
                        //print_r(getForcastData($row['country']));die;
                }
                
                if (!isset($_GET['do']))
                {
                    $_GET['do'] = "manage";
                    $do = $_GET['do'];
                }else{
                    $do = $_GET['do'];
                }
                
                
                if ($do == "manage")
                {
                    ?>
                    
                                <div class="col-md-12 chit-chat-layer1-left">
                       <div class="work-progres">
                                    <div class="chit-chat-heading">
                                          Recent Movies
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Movie Name</th>
                                              <th>Type</th>                                   
                                              <th>Votes</th>                    
                                              <th>Language</th>
                                              <th>Added By</th>
                                              <th>Options</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        //print_r($rows);die;
                                            foreach($rows as $row)
                                            {
                                                //print_r($row);die;
                                                 echo "<tr>";
                                                 echo "<td>" . $row['ID'] . "</td>";
                                                 echo "<td>" . $row['name'] . "</td>";
                                                 echo "<td>" . $row['type'] . "</td>";
                                                 echo "<td>" . $row['rate'] . "</td>";
                                                 echo '<td><span class="label label-success">' . ucwords($row['movie_lang']) .'</span></td>';
                                                 echo "<td>" . '<span class="badge badge-info">' . $row['username'] .'</span>';
                                                 echo "<td>" . '<a class="badge badge-info" href="movies.php?do=delete&movieid=' . $row['ID'] .'"> Delete</a>';
                                                 echo "<td>" . '<a class="badge badge-info" href="movies.php?do=add_link&movieid=' . $row['ID'] .'"> Add | Edit link</a>';
                                                 echo '</tr>';
                                            }
                                        ?>
                                        
                                  </tbody>
                              </table>
                            <a href="movies.php?do=add" class="btn btn-primary">Add</a>
                          </div>
                     </div>
        </div>
        
                    <?php
                }elseif($do == 'add_link'){
                    $movie_id = $_GET['movieid'];
                    $stmt = $connection->prepare("SELECT * FROM server WHERE movie_id = ? AND statues = 1");
                    $stmt->execute(array($movie_id));
                    $movie_det = $stmt->fetch();
                    ?>
                    
                    <div class="col-md-12 chit-chat-layer1-left">
                       <div class="work-progres">
                                    <div class="chit-chat-heading">
                                          Movie Download links
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              
                                              <th>Quality</th>                                   
                                                                
                                              <th>Options</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $stmt = $connection->prepare("SELECT * FROM server WHERE movie_id = ? AND statues = 2");
                                        $stmt->execute(array($movie_id));
                                        $download_Querry = $stmt->fetchAll();
                                        //print_r($rows);die;
                                            foreach($download_Querry as $row)
                                            {
                                                //print_r($row);die;
                                                 echo "<tr>";
                                                 echo "<td>" . $row['ID'] . "</td>";
                                                 
                                                 echo "<td>" . $row['quality'] . "</td>";
                                                 //echo "<td>" . $row['rate'] . "</td>";
                                                 echo "<td>" . '<a class="badge badge-info" href="movies.php?do=delete_link&movieid=' . $row['ID'] .'"> Delete</a> ';
                                                 echo '<a class="badge badge-info" href="movies.php?do=edit_link&movieid=' . $row['ID'] .'"> Edit link</a> ' . " </td>";
                                                 
                                                 echo '</tr>';
                                            }
                                        ?>
                                        
                                  </tbody>
                              </table>
                            
                          </div>
                     </div>
        </div>
        
                    <form method="post" action="update_link.php"id = "add-link">
                        <div class="form-row">
                            <input name="movie_id"type="hidden" class="form-control" id="inputname" placeholder="Stream Link" autocomplete="off" required value="<?php echo $movie_id;?>"/>

                                <?php //echo $movie_det['quality'];?>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Select A Quality</label>
                                    <select class="form-control" name="quality">
                                        <option value = "BlueRay" <?php if(trim($movie_det['quality']) == 'BlueRay') echo "selected"; ?>>BlueRay</option>
                                        <option value = "WEB-DL"<?php if(trim($movie_det['quality']) == 'WEB-DL') echo "selected"; ?>>WEB-DL</option>
                                        <option value = "HD-Rip"<?php if(trim($movie_det['quality']) == 'HD-Rip') echo "selected"; ?>>HD-Rip</option>
                                        <option value = "HDTV"<?php if(trim($movie_det['quality']) == 'HDTV') echo "selected"; ?>>HDTV</option>
                                        <option value = "DVD-Rip"<?php if(trim($movie_det['quality']) == 'DVD-Rip') echo "selected"; ?>>DVD-Rip</option>
                                        <option value = "HDTC"<?php if(trim($movie_det['quality']) == 'HDTC') echo "selected"; ?>>HDTC</option>
                                        <option value = "HD-CAM"<?php if(trim($movie_det['quality']) == 'HD-CAM') echo "selected"; ?> >HD-CAM</option>
                                        
                                        
                                    </select>
                                    
                                </div>
                    
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">The link</label>
                                    <input name="new-stream"type="text" class="form-control" id="inputname" placeholder="Stream Link" autocomplete="off" required value="<?php echo $movie_det['link'];?>"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Select A Quality</label>
                                    <select class="form-control" name="new-quality">
                                        <option value = "Full HD 1080">Full HD 1080</option>
                                        <option value = "HD 720">HD 720</option>
                                        <option value = "SD 480">SD 480</option>
                                        <option value = "SD 360">SD 360</option>
                                        <option value = "LOW 240">LOW 240</option>
                                        
                                        
                                    </select>
                                    
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">The link</label>
                                    <input name="new-download"type="text" class="form-control" id="inputname" placeholder="Download Link" autocomplete="off"  />

                                    
                                </div>
                                <button type="submit"name="submit" class="btn btn-primary" id="add">Add</button>
                            </div>
                    </form>
                    <div id="content">
                        
                    </div>
                    
                    
                    <script type="text/javascript">
                          
                          $(document).ready(function(){
                        
                             $("#add").click(function(){
                          
                                   $("#content").html(" Loading ......");
                        
                        
                             });
                        
                          });
                        
                        
                    </script>
                    <script>
                    //wait for page load to initialize script
                    $(document).ready(function(){
                        //listen for form submission
                        $('#add-link').on('submit', function(e){
                          //prevent form from submitting and leaving page
                          e.preventDefault();
                    
                          // AJAX 
                          $.ajax({
                                type: "POST", //type of submit
                                cache: false, //important or else you might get wrong data returned to you
                                url: "update_link.php", //destination
                                datatype: "html", //expected data format from process.php
                                data: $('#add-link').serialize(), //target your form's data and serialize for a POST
                                success: function(result) { // data is the var which holds the output of your process.php
                    
                                    // locate the div with #result and fill it with returned data from process.php
                                    $('#content').html(result);
                                }
                            });
                        });
                    });
                    </script>
                    <?php
                }elseif($do == 'delete_link')
                {
                    $server_id = $_GET['movieid'];
                    $stmt = $connection->prepare("DELETE FROM server WHERE ID = ?");
                    $stmt->execute(array($server_id));
                    $count_del = $stmt->rowCount();
                    echo '<div class="alert alert-success">' . $count_del . ' Link(s) Deleted!</div>';
                    header("refresh:3;url=movies.php");
                    
                }elseif($do == 'edit_link')
                {
                    $server_id = $_GET['movieid'];
                    //echo $server_id;
                    $stmt = $connection->prepare("SELECT * FROM server WHERE ID = ?");
                    $stmt->execute(array($server_id));
                    $link_det = $stmt->fetch();
                    ?>
                            <form method="post" action="?do=update_server_link&linkid=<?php echo  $server_id;?>">
                            <div class="form-row">
                                <input name="movie_id"type="hidden" class="form-control" id="inputname" placeholder="Stream Link" autocomplete="off" required value="<?php echo $movie_id;?>"/>
    
                                    <?php //echo $movie_det['quality'];?>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Select A Quality</label>
                                        <select class="form-control" name="quality">
                                            <option value = "Full HD 1080" <?php if(trim($link_det['quality']) == 'Full HD 1080') echo "selected"; ?>>Full HD 1080</option>
                                            <option value = "HD 720"<?php if(trim($link_det['quality']) == 'HD 720') echo "selected"; ?>>HD 720</option>
                                            <option value = "SD 480"<?php if(trim($link_det['quality']) == 'SD 480') echo "selected"; ?>>SD 480</option>
                                            <option value = "SD 360"<?php if(trim($link_det['quality']) == 'SD 360') echo "selected"; ?>>SD 360</option>
                                            <option value = "LOW 240"<?php if(trim($link_det['quality']) == 'LOW 240') echo "selected"; ?>>LOW 240</option>
                                            
                                            
                                            
                                        </select>
                                        
                                    </div>
                        
                                    <div class="form-group col-md-8">
                                        <label for="inputEmail4">The link</label>
                                        <input name="new-download"type="text" class="form-control" id="inputname" placeholder="Download Link" autocomplete="off" required value="<?php echo $link_det['link'];?>"/>
                                    </div>
                                    
                                    <button type="submit"name="submit" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                    
                    
                    
                    <?php
                }elseif($do == 'update_server_link')
                {
                    $server_id = $_GET['linkid'];
                    $quality   = $_POST['quality'];
                    $new_down = $_POST['new-download'];
                    if (!empty($new_down) && filter_var($new_down,FILTER_VALIDATE_URL))
                    {
                        $stmt = $connection->prepare("SELECT * FROM server WHERE link = ?");
                        $stmt->execute(array($new_down));
                        $count_download = $stmt->rowCount();
                        //print_r($count_download);
                        if ($count_download > 0)
                        {
                            echo '<div class="alert alert-danger">This Download Link Is Already Exist!</div>';
                            header("refresh:3;url=movies.php");
                        }else{
                            $stmt = $connection->prepare("UPDATE server SET link = ?,quality = ? WHERE ID = ?");
                            $stmt->execute(array($new_down,$quality,$server_id));
                            $count_down = $stmt->rowCount();
                            echo '<div class="alert alert-success">' . $count_down . ' Link(s) Updated!</div>';
                        }
                    }else{
                        echo '<div class="alert alert-danger">Enter A Valid Link!</div>';
                    }
                }
                elseif($do == "save")
                {
                    //print_r($_POST);die;
                     $movie_id = $_GET['movieid'];
                     $COUNT = 0;
                    for ($i = 1 ; $i <= 6 ; $i++)
                    {
                        
                        $Name     = "name" . $i;
                        $Birthday = "birthday" . $i;
                        $Death    = "death" . $i;
                        $Known    = "known" . $i;
                        $Gender   = "gender". $i;
                        $Image    = "image" . $i;
                        $iMDB     = "IMDB"  . $i;
                        $Place    = "place" . $i;
                        $About    = "about" . $i;
                        
                        $name     = $_POST[$Name];
                        $birthday = $_POST[$Birthday];
                        $death    = $_POST[$Death];
                        $known    = $_POST[$Known];
                        $gender    = $_POST[$Gender];
                        $image    = $_POST[$Image];
                        $IMDB    = $_POST[$iMDB];
                        $place    = $_POST[$Place];
                        $about    = $_POST[$About];
                        // search
                        $stmt = $connection->prepare("SELECT * FROM cast WHERE name = ?");
                        $stmt->execute(array($name));
                        $values = $stmt->fetch();
                        $count = $stmt->rowCount();
                        $Cast_ID = $values['ID'];
                        //echo $movie_id;
                        //echo $Cast_ID;
                        if ($count > 0 )
                        {
                            $stmt = $connection->prepare("INSERT INTO movies_cast (movie_id,cast_id) VALUES(:zmov_id,:zcst_id)");
                            $stmt->execute(array(
                            'zmov_id'   => $movie_id,
                            'zcst_id'   => $Cast_ID
                        ));
                        }else{
                            //echo $movie_id;
                        $stmt = $connection->prepare("INSERT INTO cast
                        (name,date,details,job,deathday,gender,img,IMDB,place) VALUES
                        (:zname,:zdate,:zdetails,:zjob,:zdeath,:zgender,:zimg,:zIMDB,:zplace)");
                        $stmt->execute(array(
                        'zname'       => $name,
                        'zdate'       =>$birthday,
                        'zdetails'    =>$about,
                        'zjob'        =>$known,
                        'zdeath'      =>$death,
                        'zgender'     =>$gender,
                        'zimg'        =>$image,
                        'zIMDB'       =>$IMDB,
                        'zplace'      =>$place
                        ));
                        $stmt = $connection->prepare("SELECT ID FROM cast WHERE name = ? AND date = ? AND job = ? AND IMDB = ?");
                        $stmt->execute(array($name,$birthday,$known,$IMDB));
                        $cast_ID_Row = $stmt->fetch();
                        $cast_ID = $cast_ID_Row['ID'];
                        // insert movie cast INFO.
                        $stmt = $connection->prepare("INSERT INTO movies_cast (movie_id,cast_id) VALUES(:zmov_id,:zcst_id)");
                        $stmt->execute(array(
                        'zmov_id'   => $movie_id,
                        'zcst_id'   => $cast_ID
                        ));
                        $COUNT++;
                        }
                        
                    }
                    echo '<div class="alert alert-success">' . $COUNT . ' Casts Info Inserted!</div>';
                    header("refresh:3;url=movies.php");
                }
                
                elseif($do == "delete")
                {
                    $movie_id = $_GET['movieid'];
                    $stmt = $connection->prepare("DELETE FROM movies WHERE ID = ?");
                    $stmt ->execute(array($movie_id));
                    $count= $stmt->rowCount();
                    echo '<div class="alert alert-success">' . $count . ' Movie(s) Deleted!</div>';
                    header("refresh:3;url=movies.php");
                }elseif($do == "add")
                {
                    
                    ?>
    
                        <form method="post" enctype="multipart/form-data" id="movie-links">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Trailer Link</label>
                                    <input name="trailer"type="text" class="form-control" id="inputname" placeholder="YouTube Link" autocomplete="off" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">TMDB Link</label>
                                    <input name="TMDB"type="text" class="form-control" id="inputname" placeholder="TMDB Link" autocomplete="off" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Select A Quality</label>
                                    <select class="form-control" name="quality">
                                        <option value = "BlueRay">BlueRay</option>
                                        <option value = "WEB-DL">WEB-DL</option>
                                        <option value = "HD-Rip">HD-Rip</option>
                                        <option value = "HDTV">HDTV</option>
                                        <option value = "DVD-Rip">DVD-Rip</option>
                                        <option value = "HDTC">HDTC</option>
                                        <option value = "HD-CAM">HD-CAM</option>
                                        
                                        
                                    </select>
                                    
                                </div>
                    
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">The link</label>
                                    <input name="new-stream"type="text" class="form-control" id="inputname" placeholder="Stream Link" autocomplete="off" required/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Select A Quality</label>
                                    <select class="form-control" name="new-quality">
                                        <option value = "Full HD 1080">Full HD 1080</option>
                                        <option value = "HD 720">HD 720</option>
                                        <option value = "SD 480">SD 480</option>
                                        <option value = "SD 360">SD 360</option>
                                        <option value = "LOW 240">LOW 240</option>
                                        
                                        
                                    </select>
                                    
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">The link</label>
                                    <input name="new-download"type="text" class="form-control" id="inputname" placeholder="Download Link" autocomplete="off"  />

                                    
                                </div>
                                <button type="submit"name="submit" class="btn btn-primary" id="st">View Movie Details</button>
                            </div>
                            
                        </form>
                        <div id="movie-details">
                                
                        </div>
                        <script type="text/javascript">
                          
                          $(document).ready(function(){
                        
                             $("#st").click(function(){
                          
                                   $("#movie-details").html(" Loading ......");
                        
                        
                             });
                        
                          });
                        
                        
                        </script>
                        <script>
                        //wait for page load to initialize script
                        $(document).ready(function(){
                            //listen for form submission
                            $('#movie-links').on('submit', function(e){
                              //prevent form from submitting and leaving page
                              e.preventDefault();
                        
                              // AJAX 
                              $.ajax({
                                    type: "POST", //type of submit
                                    cache: false, //important or else you might get wrong data returned to you
                                    url: "TMDB/index.php", //destination
                                    datatype: "html", //expected data format from process.php
                                    data: $('#movie-links').serialize(), //target your form's data and serialize for a POST
                                    success: function(result) { // data is the var which holds the output of your process.php
                        
                                        // locate the div with #result and fill it with returned data from process.php
                                        $('#movie-details').html(result);
                                    }
                                });
                            });
                        });
                        </script>
                    <?php
                }elseif($do== "insert")
                {
                    echo "insert";                    
                }elseif($do == "update"){
                    echo "update";
                }elseif($do="cast-info")
                {
                    function getCastInfo($link)
                    {
                        $url = $link;
                        $data = json_decode(file_get_contents($url));
                        return $data;
                    }
                    //print_r($_POST);
                    $userID  = $_SESSION['ID'];  // The movie user
                    //print_r($userID);die;
                    $name    = $_POST['name'];
                    $movie_id = "";
                    $trailer = $_POST['trailer1'];
                    $TMDB    = $_POST['TMDB1'];
                    //$stream  = $_POST['stream'];
                    //$download= $_POST['download'];
                    $poster  = $_POST['poster'];
                    $genre   = $_POST['genres'];
                    $page    = $_POST['page'];
                    $movie_IMDB = $_POST['IMDB'];
                    $movie_lang = $_POST['lang'];
                    $about   = $_POST['about'];
                    $production = $_POST['comp'];
                    $rel_date  = $_POST['rel-date'];
                    $runt_time = $_POST['run-time'];
                    $rate    = $_POST['rate'];
                    $votes_num = $_POST['votes'];
                    $stream_quality = $_POST['stream-quality'];
                    $stram_link = $_POST['stream-link'];
                    $down_quality = $_POST['download-quality'];
                    $down_link = $_POST['download-link'];
                    $stmt = $connection->prepare("SELECT * FROM movies WHERE name = ? AND TMDB_link = ? LIMIT 1");
                    $stmt->execute(array($name,$TMDB));
                    $row = $stmt->fetch();
                    $count= $stmt->rowCount();
                    // check if the movie exist
                    
                    if ($count > 0)
                    {
                        echo '<div class="alert alert-danger">Sorry, This Movie Is Already Exist!</div>';
                    }else{
                        // insert the movie data
                            $stmt = $connection->prepare("INSERT INTO movies
                            (name,details,duration,released_date,type,img_link,movie_page_link,IMDB_link,production_comp,rate,votes_num,movie_lang,TMDB_link,trailer,user_id) VALUES
                            (:zname,:zdetails,:zduration,:zreleased_date,:ztype,:zimg_link,:zmovie_page_link,:zIMDB_link,:zproduction_comp,:zrate,:zvotes_num,:zmovie_lang,:zTMDB_link,:ztrailer,:zuser_id)");
                            
                            $stmt->execute(array(
                            'zname'                => $name,
                            'zdetails'             => $about,
                            'zduration'            => $runt_time,
                            'zreleased_date'       => $rel_date,
                            'ztype'                => $genre,
                            'zimg_link'            => $poster,
                            'zmovie_page_link'     => $page,
                            'zIMDB_link'           => $movie_IMDB,
                            'zproduction_comp'     => $production,
                            'zrate'                => $rate,
                            'zvotes_num'           => $votes_num,
                            'zmovie_lang'          => $movie_lang,
                            'zTMDB_link'           => $TMDB,
                            'ztrailer'             => $trailer,
                            'zuser_id'             => $userID
                            ));
                            $movie_count = $stmt->rowCount();
                        // inser the streaming and the downloading links
                        
                        // get the movie ID
                        $stmt = $connection->prepare("SELECT ID FROM movies WHERE trailer = ? AND TMDB_link = ?");
                        $stmt->execute(array($trailer,$TMDB));
                        $movie_id = $stmt->fetch();
                        //echo $movie_id['ID'];die;
                        if (filter_var($stram_link,FILTER_VALIDATE_URL))
                        {
                            $stmt = $connection->prepare("INSERT INTO server (link,statues,quality,movie_id) VALUES(:zlink,:zstatues,:zquality,:zmovie_id)");
                            $stmt->execute(array(
                            'zlink'    => $stram_link,
                            'zstatues' => 1,
                            'zquality' => $stream_quality,
                            'zmovie_id'=>$movie_id['ID']
                            ));
                        }
                        if (filter_var($down_link,FILTER_VALIDATE_URL))
                        {
                            $stmt = $connection->prepare("INSERT INTO server (link,statues,quality,movie_id) VALUES(:zlink,:zstatues,:zquality,:zmovie_id)");
                            $stmt->execute(array(
                            'zlink'    => $down_link,
                            'zstatues' => 2,
                            'zquality' => $down_quality,
                            'zmovie_id'=>$movie_id['ID']
                            ));
                        }
                        
                            //$count = $stmt->rowCount();
                            //echo '<div class="alert alert-success">' .  $count .' Link(s) Inserted</div>';
                        
                        }
                    
                    
                    
                    // getting the cast info
                    echo '<form method="post" action="?do=save&movieid=' . $movie_id['ID'] . '" enctype="multipart/form-data" id="movie-links">';
                    echo       '<div class="form-row" style="margin-top:40px;">';
                    echo           '<center><h1>Cast Info.</h1></center></br>';
                    //print_r(getCastInfo("https://api.themoviedb.org/3/person/1136406?api_key=3af40e077e5cc34d365690d4e62ce708"));
                    for ($i = 1; $i<=6;$i++)
                    {
                        $url = "link" . $i;
                        $link= $_POST[$url];
                        $gender   = getCastInfo($link)->gender ;
                        // 1 female, 2 male 
                        if ($gender == 1)
                        {
                            $gender = "Female";
                        }elseif($gender==2)
                        {
                           $gender = "male";   
                        }else{
                           $gender = "-"; 
                        }
                        //echo "</br>" . getCastInfo($link)->name;
                        
                        ?>
                    <div id="cast<?php echo $i;?>">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4"><h3><?php echo getCastInfo($link)->name ; ?></h3></label>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Name</label>
                                        <input name="name<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="name<?php echo $i;?>" autocomplete="off" required value="<?php echo getCastInfo($link)->name; ?>"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Birthday</label>
                                        <input name="birthday<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="birthday<?php echo $i;?>" autocomplete="off" required value="<?php echo getCastInfo($link)->birthday; ?>"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Death Date</label>
                                        <input name="death<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="death<?php echo $i;?>" autocomplete="off"  value="<?php echo getCastInfo($link)->deathday; ?>"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Known For</label>
                                        <input name="known<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="known<?php echo $i;?>" autocomplete="off" required value="<?php echo getCastInfo($link)->known_for_department; ?>"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Gender</label>
                                        <input name="gender<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="gender<?php echo $i;?>" autocomplete="off" required value="<?php echo $gender; ?>"/>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="inputEmail4">Image URL</label>
                                        <input name="image<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="image<?php echo $i;?>" autocomplete="off" required value="https://image.tmdb.org/t/p/w600_and_h900_bestv2/<?php echo getCastInfo($link)->profile_path; ?>"/>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputEmail4">IMDB Link</label>
                                        <input name="IMDB<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="IMDB<?php echo $i;?>" autocomplete="off" required value="https://www.imdb.com/name/<?php echo getCastInfo($link)->imdb_id; ?>"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Birth Place</label>
                                        <input name="place<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="place<?php echo $i;?>" autocomplete="off" required value="<?php echo getCastInfo($link)->place_of_birth; ?>"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">About</label>
                                        <input name="about<?php echo $i;?>"type="text" class="form-control" id="inputname" placeholder="about<?php echo $i;?>" autocomplete="off" required value="<?php echo getCastInfo($link)->biography; ?>"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <hr>
                                    </div>
                               
                    </div>  

                        
                        <?php
                        ini_set('max_execution_time', 120); //120 seconds = 2 minutes
                        set_time_limit(120);
                    }
                    ?>
                    <div class="form-group col-md-11">
                            
                    </div>
                    <div class="form-group col-md-1">
                            <button class="btn btn-success" name="submit">Upload</button>
                    </div>
                    <?php
                    echo '</div>';
                    echo     '</form>';
                }
                
                
                
        
        ?>
            
        <?php
                if (isset($slider))
                {
                        include("slider.php");
                }
        ?>
        <script>
        var toggle = true;
                    
        $(".sidebar-icon").click(function() {                
          if (toggle)
          {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
          }
          else
          {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
              $("#menu span").css({"position":"relative"});
            }, 400);
          }               
                        toggle = !toggle;
                    });
        </script>
        <!--scrolling js-->
                <script src="js/jquery.nicescroll.js"></script>
                <script src="js/scripts.js"></script>
                <!--//scrolling js-->
        <script src="js/bootstrap.js"> </script>
        <!-- mother grid end here-->
        <?php
        
    }else{
        header("location:login.php");
        exit();
    }

    ob_end_flush();
?>