    <?php
        $dsn      = "mysql:host=localhost;dbname=stream";          // Data Source Name 
        $user     = 'root';                                          // DBase Username 
        $password = '';                                              // DBase Password
        $options  = array(                                           // Options For The Arabic Errors
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'                 
        );
        
        try{
            $connection       = new PDO( $dsn, $user , $password , $options); // New PDO Connection
            $connection       ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "You Are Connected!";
        }catch(PDOException $e)
        {
            echo "Faild".$e->getMessage();
        }
        
         
        
    ?>