<!-- doctype yказывает версию языка html -->
<!doctype html>
<html>
    <!-- head логический раздел документа -->
    <head>
        
        <!-- yказание кодировки содержимого -->
        <meta charset="utf-8">
               
              <!-- заголовок документа -->
        <title>tester-animator</title>
        
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
            <!--  подключение логики (javascript) -->
             <script type="text/javascript" src="jquery.js"></script> 
             <script type="text/javascript" src="script.js"></script>
        
             <!-- подключение стилизации (css) -->
              <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <!-- body визуальный раздел документа -->
    <body>
        <!-- ../ от этой папки наверх ../../ на две папки наверх -->
        <?php include ('../module/template/navbar.php'); ?>        
    
        <div class="a">
        <div class="jumbotron jumbotron-fluid custom-background-picture-wide-1">
            <div class="container-fluid">
                <h1 class="display-3">3dzudoist</h1>
                    <p class="lead">просто 3d модельки </p>
                        <hr class="my-4">
                    
                    <p class="lead">
                     <a class="btn btn-primary btn-lg" href="uploadobj.php" role="button">действие0</a>
                     <a class="btn btn-primary btn-lg" href="upploadpic.php" role="button">действие1</a>   
                </p>
            </div>
        </div>
     
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-6">
    
                </div>
            </div>
        </div>
            </div>
        
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="popper.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script type="text/javascript" src="bootstrap.min.js"></script>   
    </body>
</html>
            