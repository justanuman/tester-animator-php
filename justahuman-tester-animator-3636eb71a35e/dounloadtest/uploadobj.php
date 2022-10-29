<?php 
    include('../database.php');
?>
<!doctype html>
<html>
    <!-- head логический раздел документа -->
    <head>
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
        <!-- yказание кодировки содержимого -->
        <meta charset="utf-8">
           
        
              <!-- заголовок документа -->
            <title> tester-animator </title>
        
            <!--  подключение логики (javascript) -->
             <script type="text/javascript" src="jquery.js"></script> 
             <script type="text/javascript" src="script.js"></script>
        
             <!-- подключение стилизации (css) -->
              <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <!-- body визуальный раздел документа -->
    <body>
        <?php include ('../module/template/navbar.php'); ?>
         
        
        <?php
        if(!empty($_FILES['vaninfileobj'])){
            
        // Каталог, в который мы будем принимать файл:
        $uploaddirobj = $_SERVER['DOCUMENT_ROOT'].'../obj/';
        $vaninfileobj = $uploaddirobj.basename(date('Y-m-d-H-i-s')."-".rand(1,10));
        $vaninfileobj = $vaninfileobj.".obj";    
        $uploaddir_to_dbobj = '/files/';
        $vaninfile_to_dbobj = $uploaddir_to_dbobj.basename(date('Y-m-d-H-i-s').'.obj');
        $vaninfile_to_dbobj = $vaninfile_to_dbobj.".obj";
        // Копируем файл из каталога для временного хранения файлов:
        if (copy($_FILES['vaninfileobj']['tmp_name'], $vaninfileobj))
        {
        echo "<h3>Файл успешно загружен на сервер</h3>";
            
        }
        else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

        // Выводим информацию о загруженном файле:
            $query  = mysql_query("
                        INSERT INTO
                        files(
                            path
                        ) VALUES (
                            '$vaninfile_to_dbobj'
                        )",$db); 
        }
        ?>
                <form enctype="multipart/form-data" method="post">
                    <input type="file" name="vaninfileobj">
                    <button type="submit">Отправить</button>
                </form>
            
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="popper.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script type="text/javascript" src="bootstrap.min.js"></script> 
    </body>
</html>