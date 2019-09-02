<?php
    ob_start();
    session_start();
    include("config.php");
    $navbar = "";
    $pageTitle = "Dashboard | Members ";
    $slider = "";
    if (isset($_SESSION['loggedin']))
    {
        $stmt = $connection->prepare("SELECT * FROM users");
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
                                          Recent Users
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Username</th>
                                              <th>E-mail</th>                                   
                                              <th>Country</th>                    
                                              <th>Status</th>
                                              <th>Control</th>
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
                                                 echo "<td>" . $row['username'] . "</td>";
                                                 echo "<td>" . $row['email'] . "</td>";
                                                 echo "<td>" . $row['country'] . "</td>";
                                                        if ($row['statues'] == 1)
                                                        {
                                                            echo '<td><span class="label label-success">Admin</span></td>';
                                                        }else{
                                                            echo '<td><span class="label label-danger">User</span></td>';
                                                        }
                                                echo "<td>" . '<a href="members.php?do=edit&userid=' . $row['ID'] . '"class="btn btn-success">Edit</a>';
                                                echo ' <a href="members.php?do=delete&userid=' . $row['ID'] . '"class="btn btn-danger">Delete</a>' ."</td>";
                                                echo '</tr>';
                                            }
                                        ?>
                                        
                                  </tbody>
                              </table>
                            <a href="members.php?do=add" class="btn btn-primary">Add</a>
                          </div>
                     </div>
        </div>
                    <?php
                }elseif($do == "edit")
                {
                    
                    if (isset($_SESSION['loggedin']))
                    {
                       $userid = $_GET['userid'];
                       $stmt = $connection->prepare("SELECT * FROM users WHERE ID = ? LIMIT 1");
                       $stmt->execute(array($userid));
                       $rows = $stmt->fetch();
                       
                    
                    ?>
                    <form method="post" action="?do=update" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">name</label>
                              <input name="name"type="text" class="form-control" id="inputname" placeholder="name" autocomplete="off"  value="<?php echo $rows['username']; ?>" />
                              <input  type="text"name="id" value="<?php echo $userid; ?>" hidden>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">E-mail</label>
                              <input name = "email"type="email" class="form-control" id="inputemail" placeholder="E-mail"autocomplete="off"  value="<?php echo $rows['email']; ?>" disabled/>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputAddress">Password</label>
                            <input name = "password"type="password" class="form-control" id="inputpass" placeholder="Password"autocomplete="off" />
                          </div>
                          

                            <div class="form-group col-md-6">
                              <label for="inputCity">Country</label>
                              <input name = "country"type="text" class="form-control" id="inputCity" value="<?php echo $rows['country']; ?>">
                            </div>
                            <div class="form-group col-md-12">
                            <label class="mr-sm-6" for="inlineFormCustomSelect">User Statues</label>
                            <select name = "statues"class="custom-select mr-sm-6" id="inlineFormCustomSelect">
                              <option selected>Choose...</option>
                              <option value="1" <?php if ($rows['statues'] == 1) echo "selected"; ?>>Admin</option>
                              <option value="2" <?php if ($rows['statues'] == 2) echo "selected"; ?>>User</option>
                            </select>
                            </div>

                          <button type="submit"name="submit" class="btn btn-primary">Insert</button>
                </form>
                <?php
                
                }
                
                }elseif($do == "delete")
                {
                    if (isset($_SESSION['loggedin']))
                    {
                        $userid = $_GET['userid'];
                        $stmt = $connection->prepare("DELETE FROM users WHERE ID = ?");
                        $stmt->execute(array($userid));
                        $count = $stmt->rowCount();
                        echo '<div class="alert alert-success" >' . $count . ' Rows Deleted </div>';
                        header("refresh:3;url=members.php");
                    }
                }elseif($do == "add")
                {
                    ?>
                    <form method="post" action="?do=insert" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">name</label>
                              <input name="name"type="text" class="form-control" id="inputname" placeholder="name" autocomplete="off" required />
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">E-mail</label>
                              <input name = "email"type="email" class="form-control" id="inputemail" placeholder="E-mail"autocomplete="off" rrequiredeq />
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputAddress">Password</label>
                            <input name = "password"type="password" class="form-control" id="inputpass" placeholder="Password"autocomplete="off" required/>
                          </div>
                          

                            <div class="form-group col-md-6">
                              <label for="inputCity">Country</label>
                              <input name = "country"type="text" class="form-control" id="inputCity" required>
                            </div>
                            <div class="form-group col-md-12">
                            <label class="mr-sm-6" for="inlineFormCustomSelect">User Statues</label>
                            <select name = "statues"class="custom-select mr-sm-6" id="inlineFormCustomSelect"required>
                              <option selected>Choose...</option>
                              <option value="1">Admin</option>
                              <option value="2">User</option>
                            </select>
                            </div>

                          <button type="submit"name="submit" class="btn btn-primary">Insert</button>
                </form>
                <?php
                }elseif($do== "insert")
                {
                    if ($_SERVER['REQUEST_METHOD'] == "POST")
                    {
                        $name = ucwords($_POST['name']);
                        $pass = sha1($_POST['password']);
                        $email= $_POST['email'];
                        $country = $_POST['country'];
                        $Statues = $_POST['statues'];
                        //echo $Statues;die;
                        // check errors
                        $errors = array();
                        if (empty($name))
                        {
                            $errors[] = '<div class="alert alert-danger" >Please, Enter Your Name!</div>';
                        }
                        if (empty($_POST['password']))
                        {
                            $errors[] = '<div class="alert alert-danger" >Please, Enter Password!</div>';
                        }
                        if (empty($email))
                        {
                            $errors[] = '<div class="alert alert-danger" >Please, Enter Your E-mail!</div>';
                        }
                        if (empty($country))
                        {
                            $errors[] = '<div class="alert alert-danger" >Please, Enter Your country!</div>';
                        }
                        if (empty($Statues))
                        {
                            $errors[] = '<div class="alert alert-danger" >Please, Choose The User Statues!</div>';
                        }
                        foreach($errors as $error)
                        {
                            echo $error;
                        }
                        // check if the user is exist
                        if (empty($errors))
                        {
                            $stmt = $connection->prepare("SELECT * FROM users WHERE email = ? OR password = ? LIMIT 1");
                            $stmt->execute(array($email,$pass));
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0)
                            {
                                echo '<div class="alert alert-danger" >This user already exist, Please enter anthor one!</div>';
                                header("refresh:3;url=members.php");
                                exit();
                            }else{
                                $stmt = $connection->prepare("INSERT INTO users (username,password,email,country,statues) VALUES(:zname,:zpass,:zemail,:zcountry,:zstat)");
                                $stmt->execute(array(
                                   'zname' => $name,
                                   'zpass' => $pass,
                                   'zemail'=> $email,
                                   'zcountry'=>$country,
                                   'zstat'  => $Statues
                                ));
                                
                                echo '<div class="alert alert-success" >' . $stmt->rowCount() . ' Rows Inserted </div>';
                                header("refresh:3;url=members.php");
                            }
                        }
                        
                    }else{
                        echo '<div class="alert alert-danger" >Sorry You Can not Enter This Page!</div>';
                    }
                    
                }elseif($do == "update"){
                    if($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        $userid = $_POST['id'];
                        $name   = ucwords($_POST['name']);
                        $pass   = $_POST['password'];
                        $hash_pass = sha1($pass);
                        $country=$_POST['country'];
                        $statues=$_POST['statues'];
                        // check empty
                        $errors = array();
                        if (empty($name))
                        {
                            $errors[] = '<div class="alert alert-danger" >Please, Enter Your Name!</div>';
                        }
                        if (empty($pass))
                        {
                            $errors[] = '<div class="alert alert-danger" >Please, Enter Password!</div>';
                        }
                        if (empty($country))
                        {
                            $errors[] = '<div class="alert alert-danger" >Please, Enter Your Country!</div>';
                        }
                        foreach($errors as $error)
                        {
                            echo $error;
                        }
                        header("refresh:3;url=members.php");
                        if (empty($errors))
                        {
                            $stmt = $connection->prepare("UPDATE users SET username = ?,password = ?,country = ?,statues = ? WHERE ID =?");
                            $stmt->execute(array($name,$hash_pass,$country,$statues,$userid));
                            $count = $stmt->rowCount();
                            echo '<div class="alert alert-success" >' . $count . ' Rows Updated</div>';
                            header("refresh:3;url=members.php");
                        }
                    }else{
                        echo '<div class="alert alert-danger" >Sorry You Can not Enter This Page!</div>';
                        
                    }
                    
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