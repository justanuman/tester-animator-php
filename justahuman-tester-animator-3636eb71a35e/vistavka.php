<!doctype html>
<html>
<head>
        
        <!-- yказание кодировки содержимого -->
        <meta charset="utf-8">
               
              <!-- заголовок документа -->
            <title> showdown </title>
        
            <!--  подключение логики (javascript) -->
             <script type="text/javascript" src="jquery.js"></script> 
             <script type="text/javascript" src="script.js"></script>
             <script src="http://scenejs.org/api/latest/scenejs.js"></script>

             <!-- подключение стилизации (css) -->
              <link rel="stylesheet" type="text/css" href="style.css">
              <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
</head>
<body>
<?php 
    
    include('database.php');
    include ('module/template/navbar.php');
    function db_images_get_all($database){

        $query = mysql_query(
          "
            SELECT * FROM 
              files 
          ",
          $database
        );
        
        if(mysql_num_rows($query) >= 1){
            while($row = mysql_fetch_array($query)){
                $rows[] = $row;
            }
            return $rows;
            $id = $id + 1;
        }else{
          return false;
        }{
      }
    }

    $images = db_images_get_all($db);
?>


<ul class="images">
    <?php foreach($images as $image){ ?>
        <li class="">
            
            <?php $width_mini = getimagesize($_SERVER['DOCUMENT_ROOT'].$image['path'])[0]; ?>
            <?php $height_mini = getimagesize($_SERVER['DOCUMENT_ROOT'].$image['path'])[1]; ?>
            <?php $customheight = 360; ?>
            <?php $custom_width = ( $customheight * $height_mini) / $width_mini; ?>
            <?php // echo $custom_width; ?>
            <a href="" style= "margin: 0; padding: 0; border: 0; "><img src="<?php echo $image['path']; ?>" width="<?php echo $custom_width ; ?>"></a>
        </li>
    <?php } ?>
</ul>
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="popper.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script type="text/javascript" src="bootstrap.min.js"></script>   
</body>
</html>