
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </head>
        <body>
    
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //print_r($_POST);die;
        include("config.php");
        $id   = $_POST['id'];
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $country = $_POST['country'];
        $image   = $_FILES['image'];
        //print_r($_FILES);die;
        if (!empty($name))
        {
            $stmt = $connection->prepare("UPDATE users SET username = ? WHERE ID = ?");
            $stmt->execute(array($name,$id));
        }
        if (!empty($pass))
        {
            $hased_pass = sha1($pass);
            $stmt = $connection->prepare("UPDATE users SET password = ? WHERE ID = ?");
            $stmt->execute(array($hased_pass,$id));
        }
        if (!empty($country))
        {
            $stmt = $connection->prepare("UPDATE users SET country = ? WHERE ID = ?");
            $stmt->execute(array($country,$id));
        }
        if (!empty($image))
        {
            $targetDir = "imgs/";
            $image_name = basename($_FILES['image']['name']);
            $targetFile= $targetDir . basename($_FILES['image']['name']);
            $uploadOk  = 1;
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES['image']['tmp_name']);
                if ($check != false)
                    {
                     $uploadOk = 1;
                    }
                    else{
                        $uploadOk=0;
                    }
            // check if the file exist
                if (file_exists($targetFile))
                {
                    $uploadOk = 0;
                }else{
                    $uploadOk = 1;
                }
            // check the file size
            if ($_FILES['image']['size'] > 2000000)
            {
                
            
            ?>
            <div class="alert alert-danger">
                Sorry, The file is to large!
            </div>
            <?php
            $uploadOk = 0;
            }
            // check if the image not png, jpg,jpeg,gif
            if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "png")
            {
                ?>
                     <div class="alert alert-danger" role="alert">
                          We don't Support This type of images !
                      </div>
                <?php
                    $uploadOk = 0;   
            }
            //echo $uploadOk ; die;
            if ($uploadOk == 0)
            {
                echo "Sorry, There is an error happend while uploading the file!";
            }else{
                $stmt = $connection->prepare("SELECT image from users WHERE ID = ? LIMIT 1");
                $stmt->execute(array($id));
                $row = $stmt->fetch();
                $old_img = $row['image'];
                $old_img_path = "imgs/" . $old_img;
                //print_r($old_img_path);die;
                if (move_uploaded_file($_FILES['image']['tmp_name'],$targetFile))
                {
                    $stmt = $connection->prepare("UPDATE users SET image = ? WHERE ID = ?");
                    $stmt->execute(array($image_name,$id));
                    if (!empty($old_img))
                    {
                        if (!unlink($old_img_path))
                        {
                            echo "Faild to Delete";die;
                        }else{
                            echo "deleted";
                        }
                    }
                    header("location:index.php");
                    exit();
                }else{
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
    
?>
</body>