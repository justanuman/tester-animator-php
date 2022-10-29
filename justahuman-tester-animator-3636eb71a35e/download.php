<?php 
    include('database.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<!doctype html>
<html>
    <head>
 <!-- yказание кодировки содержимого -->
        <meta charset="utf-8">
               
              <!-- заголовок документа -->
            <title> tester-animator </title>
        
            <!--  подключение логики (javascript) -->
             <script type="text/javascript" src="jquery.js"></script> 
             <script type="text/javascript" src="script.js"></script>
        
             <!-- подключение стилизации (css) -->
              <link rel="stylesheet" type="text/css" href="style.css">
                <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
</head>
    <body>
        <?php include ('module/template/navbar.php'); ?>
        <?php
        ?>
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="popper.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script type="text/javascript" src="bootstrap.min.js"></script>   
    </body>
</html>