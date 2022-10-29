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
        if(!empty($_FILES['vaninfilejpg'])){
            
        // Каталог, в который мы будем принимать файл:
        $uploaddirjpg = $_SERVER['DOCUMENT_ROOT'].'../jpg/';
        $vaninfilejpg = $uploaddirjpg.basename(date('Y-m-d-H-i-s')."-".rand(1,10));
        $vaninfilejpg = $vaninfilejpg.(".jpg");   
        $uploaddir_to_dbjpg = ('/files/');
        $vaninfile_to_dbjpg = $uploaddir_to_dbjpg.basename(date('Y-m-d-H-i-s').'.jpg');
        $vaninfile_to_dbjpg = $vaninfile_to_dbjpg.".jpg";
        // Копируем файл из каталога для временного хранения файлов:
        if (copy($_FILES['vaninfilejpg']['tmp_name'], $vaninfilejpg))
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
                            '$vaninfile_to_dbjpg'
                        )",$db); 
        }
        ?>
                <form enctype="multipart/form-data" method="post">
                    <input type="file" name="vaninfilejpg">
                    <button type="submit">Отправить</button>
                </form>
         <p class="lead">
                     <a class="btn btn-primary btn-lg" href="uploadobj.php" role="button">действие0</a>
                </p>
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="popper.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script type="text/javascript" src="bootstrap.min.js"></script> 
    </body>
</html>