<?php 
    include('database.php');
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
        <?php include ('module/template/navbar.php'); ?>
        <?php
        $numb=0;  
        $number = 99;
        $number = mysql_query("
                    SELECT 
                        * 
                    FROM 
                        users 
                    WHERE 
                       num = '$numb'
                ",$db);
            
            echo "$numb";
            echo "$number";
        ?>
        
        <?php
        if(!empty($_FILES['vaninfile'])){
            
        // Каталог, в который мы будем принимать файл:
        $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/files/';
        $vaninfile = $uploaddir.basename(date('Y-m-d-H-i-s').'.jpg');
            
        $uploaddir_to_db = '/files/';
        $vaninfile_to_db = $uploaddir_to_db.basename(date('Y-m-d-H-i-s').'.jpg');
        
        // Копируем файл из каталога для временного хранения файлов:
        if (copy($_FILES['vaninfile']['tmp_name'], $vaninfile))
        {
        echo "<h3>Файл успешно загружен на сервер</h3>";
            
        }
        else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

        // Выводим информацию о загруженном файле:
        echo "<h3>Информация о загруженном на сервер файле: </h3>";
        echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['vaninfile']['name']."</b></p>";
        echo "<p><b>Mime-тип загруженного файла: ".$_FILES['vaninfile']['type']."</b></p>";
        echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['vaninfile']['size']."</b></p>";
        echo "<p><b>Временное имя файла: ".$_FILES['vaninfile']['tmp_name']."</b></p>";
            
            
            $query  = mysql_query("
                        INSERT INTO
                        files(
                            path
                        ) VALUES (
                            '$vaninfile_to_db'
                        )",$db); 
        }
        ?>
                <form enctype="multipart/form-data" method="post">
                    <input type="file" name="vaninfile">
                    <button type="submit">Отправить</button>
                </form>
            
          
        <?php
                if(!empty($_FILES['vaninfile2'])){

                // Каталог, в который мы будем принимать файл:
                $uploaddir2 = $_SERVER['DOCUMENT_ROOT'].'/models/';
                $vaninfile2 = $uploaddir2.basename($_FILES['vaninfile2']['name']);
                
                $uploaddir_to_db2 = '/models/';
                $vaninfile_to_db2 = $uploaddir_to_db2.basename($_FILES['vaninfile2']['name']);

                // Копируем файл из каталога для временного хранения файлов:
                if(copy($_FILES['vaninfile2']['tmp_name'], $vaninfile2))
                {
                echo "<h3>Файл успешно загружен на сервер</h3>";
                    unlink($_FILES['vaninfile2']['tmp_name']);
                }
                else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

                // Выводим информацию о загруженном файле:
                echo "<h3>Информация о загруженном на сервер файле: </h3>";
                echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['vaninfile2']['name']."</b></p>";
                echo "<p><b>Mime-тип загруженного файла: ".$_FILES['vaninfile2']['type']."</b></p>";
                echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['vaninfile2']['size']."</b></p>";
                echo "<p><b>Временное имя файла: ".$_FILES['vaninfile2']['tmp_name']."</b></p>";


                    $query  = mysql_query("
                                INSERT INTO
                                models(
                                    path
                                ) VALUES (
                                    '$vaninfile_to_db2'
                                )",$db); 
                }

            ?>
        <form enctype="multipart/form-data" method="post">
            <input type="file" name="vaninfile2">
            <button type="submit">Отправить</button>
        </form>
        
       
        
    


        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="popper.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script type="text/javascript" src="bootstrap.min.js"></script> 
    </body>
</html>