<?php
    $stream = $_POST['new-stream'];
    $down_quality = $_POST['new-quality'];
    $download = $_POST['new-download'];
    $movie_id = $_POST['movie_id'];
    include("config.php");
    if (!empty($stream) &&filter_var($stream, FILTER_VALIDATE_URL) )
    {
        $quality = $_POST['quality'];
        $stmt = $connection->prepare("SELECT * FROM server WHERE link = ?");
        $stmt->execute(array($stream));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        //echo $count;
        
        if ($count > 0 )
        {
            echo '</br><div class="alert alert-danger">This Streaming link already exist!</div>';
        }else{
            $stmt = $connection->prepare("UPDATE server SET link = ?,quality = ? WHERE movie_id = ? AND statues = 1");
            $stmt->execute(array($stream,$quality,$movie_id));
            $count_links = $stmt->rowCount();
            echo '<div class="alert alert-success">' . $count_links . ' link(s) Inserted </div>';
            
        }
        
        
        
    }else{
        echo '</br><div class="alert alert-danger">Please, Enter A Valid Link!</div>';
    }
    if (!empty($download) &&filter_var($download, FILTER_VALIDATE_URL))
    {
        $stmt = $connection->prepare("SELECT * FROM server WHERE link = ?");
        $stmt->execute(array($download));
        $download_q = $stmt->fetch();
        $count_down = $stmt->rowCount();
        //echo $count_down;
        if ($count_down > 0)
        {
            echo '</br><div class="alert alert-danger">This Download link already exist!</div>';
        }else{
            $stmt = $connection->prepare("INSERT INTO server (link,statues,quality,movie_id) VALUES(:zlink,:zstat,:zqual,:zid)");
            $stmt->execute(array(
            'zlink' => $download,
            'zstat' => 2,
            'zqual' => $down_quality,
            'zid'   => $movie_id
            ));
            $count_links = $stmt->rowCount();
            echo '<div class="alert alert-success">' . $count_links . ' link(s) Inserted </div>';
        }
    }else{
        
        echo '</br><div class="alert alert-danger">Please, Enter A Valid Link!</div>';
    }
 ?>