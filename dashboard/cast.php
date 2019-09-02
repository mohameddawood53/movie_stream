<?php
    ob_start();
    session_start();
    include("config.php");
    $navbar = "";
    $pageTitle = "Dashboard | Cast ";
    $slider = "";
    if (isset($_SESSION['loggedin']))
    {
        $stmt = $connection->prepare("SELECT * FROM cast ORDER BY ID DESC");
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
            <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
            
      </head>
        <body onload="startTime();">	
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
                                          Recent Casts
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Cast Name</th>
                                              <th>Gender</th>                                   
                                              <th>Job</th>                    
                                              <th>From</th>
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
                                                 echo "<td>" . ucwords($row['gender']) . "</td>";
                                                 echo "<td>" . $row['job'] . "</td>";
                                                 echo '<td><span class="label label-success">' . ucwords($row['place']) .'</span></td>';
                                                 //echo "<td>" . '<span class="badge badge-info">' . $row['username'] .'</span>';
                                                 echo '<td><a class="badge badge-info" href="cast.php?do=edit&castid=' .  $row['ID'] . '">Edit</a></td>'; 
                                                 echo '<td><a class="label label-danger" href="cast.php?do=delete&castid=' .  $row['ID'] . '">Delete</a></td>'; 
                                                 echo '</tr>';
                                            }
                                        ?>
                                        
                                  </tbody>
                              </table>
                          </div>
                     </div>
        </div>
                    <?php
                }
                
                elseif($do == "delete")
                {
                    $cast_id = $_GET['castid'];
                    $stmt = $connection->prepare("DELETE FROM cast WHERE ID = ?");
                    $stmt->execute(array($cast_id));
                    $Del_cast = $stmt->rowCount();
                    echo '<div class="alert alert-danger">'. $Del_cast .' Deleted Rows!</div>';
                    
                    header("refresh:3;url=cast.php");
                    
                }elseif($do == "add")
                {
                    echo "add";
                }elseif($do== "insert")
                {
                    echo "insert";                    
                }elseif($do == "update"){
                    $cast_id = $_GET['castid'];
                    //echo $cast_id;
                    //print_r( $_POST);die;
                    $name   = $_POST['name'];
                    $birth  = $_POST['birth'];
                    $death  = $_POST['death'];
                    $detail = $_POST['detail'];
                    $job   = $_POST['job'];
                    $gender = $_POST['gender'];
                    $img    = $_POST['img'];
                    $place  = $_POST['place'];
                    $IMDB   = $_POST['IMDB'];
                    
                    $Errors = array();
                    if (empty($name))
                    {
                        $Errors = '<div class="alert alert-danger">Please, Enter A Cast Name!</div>'; 
                    }
                    if (empty($birth))
                    {
                        $Errors = '<div class="alert alert-danger">Please, Enter A Cast Birthday!</div>'; 
                    }
                    if (empty($death))
                    {
                        $Errors = '<div class="alert alert-danger">Please, Enter A Cast Deathday!</div>'; 
                    }
                    if (empty($detail))
                    {
                        $Errors = '<div class="alert alert-danger">Please, Enter A Cast Deatails!</div>'; 
                    }
                    if (empty($job))
                    {
                        $Errors = '<div class="alert alert-danger">Please, Enter A Cast Job!</div>'; 
                    }
                    if (empty($gender))
                    {
                        $Errors = '<div class="alert alert-danger">Please, Enter A Cast Gender!</div>'; 
                    }
                    if (empty($place))
                    {
                        $Errors = '<div class="alert alert-danger">Please, Enter A Cast Place Of Birth!</div>'; 
                    }
                    
                    if (!empty($error))
                    {
                        foreach($Errors as $error)
                        {
                            echo $error;
                        }
                        header("refresh:3;url=cast.php?castid=$cast_id");
                    }else{
                        $stmt = $connection->prepare("UPDATE cast SET
                        name = ?,date = ?,details = ?,job	= ?,deathday = ?,gender = ?,img = ?,IMDB = ?,place = ? WHERE ID = ?");
                        $stmt->execute(array(
                        $name,$birth,$detail,$job,$death,$gender,$img,$IMDB,$place,$cast_id
                        ));
                        $count_cast = $stmt->rowCount();
                        echo '<div class="alert alert-primary">'. $count_cast .' Row(s) Updated!</div>';
                        header("refresh:3;url=cast.php");
                    }
                    
                }elseif($do == "edit")
                {
                    //echo "edit";
                    $cast_id = $_GET['castid'];
                    $stmt = $connection->prepare("SELECT * FROM cast WHERE ID = ?");
                    $stmt->execute(array($cast_id));
                    $cast_info = $stmt->fetch();
                    
                    ?>
                    <form method="post" action = "?do=update&castid=<?php echo $cast_id; ?>"enctype="multipart/form-data" id="movie-links">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Name</label>
                                    <input name="name"type="text" class="form-control" id="inputname" placeholder="Name" autocomplete="off" required value="<?php echo $cast_info['name'] ;?> " />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Date Of Birth</label>
                                    <input name="birth"type="text" class="form-control" id="inputname" placeholder="" autocomplete="off" required value="<?php echo $cast_info['date'] ;?> "/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Date Of Death</label>
                                    <input name="death"type="text" class="form-control" id="inputname" placeholder="" autocomplete="off" required value="<?php echo $cast_info['deathday'] ;?> "/>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Details</label>
                                    <input name="detail"type="text" class="form-control" id="inputname" placeholder="Details" autocomplete="off" required value="<?php echo $cast_info['details'] ;?> "/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Job</label>
                                    <input name="job"type="text" class="form-control" id="inputname" placeholder="Job" autocomplete="off" required value="<?php echo $cast_info['job'] ;?> "/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Gender</label>
                                    <input name="gender"type="text" class="form-control" id="inputname" placeholder="Gender" autocomplete="off" required value="<?php echo $cast_info['gender'] ;?> "/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Image Link</label>
                                    <input name="img"type="text" class="form-control" id="inputname" placeholder="Image Link" autocomplete="off" required value="<?php echo $cast_info['img'] ;?> "/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">IMDB Link</label>
                                    <input name="IMDB"type="text" class="form-control" id="inputname" placeholder="IMDB Link" autocomplete="off" required value="<?php echo $cast_info['IMDB'] ;?> "/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Place Of Birth</label>
                                    <input name="place"type="text" class="form-control" id="inputname" placeholder="Place Of Birth" autocomplete="off" required value="<?php echo $cast_info['place'] ;?> "/>
                                </div>
                                <button type="submit"name="submit" class="btn btn-primary" id="st">Update</button>
                            </div>
                            
                        </form>
                    <?php
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