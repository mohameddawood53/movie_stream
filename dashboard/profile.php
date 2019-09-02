<?php
    session_start();
    include("config.php");
    $navbar = "";
    $id = $_GET['id'];
    $stmt = $connection->prepare("SELECT * FROM users WHERE ID = ? LIMIT 1");
    $stmt->execute(array($id));
    $row = $stmt->fetch();
    ?>
    <!DOCTYPE html>
        <html>
            <head>
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
            <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
             <!-- Chartinator  -->
            <script src="js/chartinator.js" ></script>
                <title>Dashboard | Profile</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            </head>
            <body>
                <?php
                    if (isset($navbar))
                        {
                                include("nav.php");
                        }
                ?>
                <form method="post" action="save.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">name</label>
                              <input name="name"type="text" class="form-control" id="inputname" placeholder="name" autocomplete="off" value="<?php echo $row['username'] ;?>"/>
                              <input name="id" type="text" hidden="hidden" value="<?php echo $row['ID']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">E-mail</label>
                              <input name = "email"type="email" class="form-control" id="inputemail" placeholder="E-mail"autocomplete="off" disabled value="<?php echo $row['email'] ;?>"/>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputAddress">Password</label>
                            <input name = "password"type="password" class="form-control" id="inputpass" placeholder="Password"autocomplete="off"/>
                          </div>
                          

                            <div class="form-group col-md-6">
                              <label for="inputCity">Country</label>
                              <input name = "country"type="text" class="form-control" id="inputCity" value="<?php echo $row['country'] ;?>">
                            </div>
                            <div class="custom-file form-group col-md-12">
                            <label>Profile picture</label>
                            <input name = "image" type="file" class="custom-file-input" id="customFile">
                            <label  class="custom-file-label" for="customFile">Choose file</label>
                          </div>

                          <button type="submit"name="submit" class="btn btn-primary">Save</button>
                </form>
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
            </body>
        </html>
    <?php
    
?>