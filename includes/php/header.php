<?php  
        session_start();
        $hostname   = "localhost";
        $dbusername   = "root";
        $dbpassword   = "";
        $dbname     = "must_1";
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $dbusername, $dbpassword);
        if(!$pdo){
            echo "No Connection to Database!!";
            die;
        }
        
    ?>