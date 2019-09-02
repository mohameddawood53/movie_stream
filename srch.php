<?php
    $srchq = $_GET['searchq'];
    $srchq = str_replace(" ", "+",$srchq);
    if ($_GET['val'] == 'movie')
    {
        header("Location:movies.php?do=search_movie&searchq=$srchq", true, 302);
        echo "welcome";
        exit();
    }elseif($_GET['val'] == 'cast'){
        header("Location:movies.php?do=search_cast&searchq=$srchq", true, 302);
        echo "welcome";
        exit();
    }
    


?>
