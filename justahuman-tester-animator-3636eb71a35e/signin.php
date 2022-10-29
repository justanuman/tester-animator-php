<?php

    // include функция подключает внешний файл
     include('database.php');
     include('sessions.php');
    // if условный оператор если
    // в круглых скобках указываетсая само условие
    // в фигурных скобках указывается само действие, если условие выполняется
    if(
        //if условный оператор если
        //функция isset проверяет все на наличие значения и понимается "есть"
        //$_REQUEST глобальный массив переменная в котором хранятся передаваемые параметры запроса к серверу
        isset($_REQUEST['user-registration'])
    ){
    //все условие звучит так если не пустое значение  name_first и name_last и username то password
        
        //if условный оператор если
        //в круглых скобках указываетсая само условие
        //в фигурных скобках указывается само действие, если условие выполняется
        if(
            !empty($_REQUEST['username'])
            and
            !empty($_REQUEST['password']) 
        ){
        // все условие звучит так если не пустое значение  name_first и name_last и username    
       
        //$  перед названием объявляет переменную в рhр или меняет занчение ранне указаной 
        $signin_username = $_REQUEST['username'];
        $signin_password = $_REQUEST['password'];
        if(
            strlen($signin_username) < 5 
            and 
            strlen($signin_password) < 8
        ){
                $status_signin = false;
        }else{$query_check = mysql_query("
            SELECT 
                * 
            FROM 
                users 
            WHERE 
               username = '$signin_username'
            AND
                password= '$signin_password'
        ",$db);
            
         if(mysql_num_rows($query_check) == 1){
             
           $status_signin = true;
        //$  перед названием объявляет переменную в рhр или меняет значение ранне указаной 
        //объявлена переменная $signin_query_user, в неё помещается результат обработки переменной $query_check
        //mysql_fetch_assoc преобразует результат mysqlзапроса (запроса к базе данных) 
        //в ассоциативный массив (это список данных по параметрам или ассоциации, где значение разбиты поименно )
        $signin_query_user = mysql_fetch_assoc($query_check);   
         
         
        //объявлена $signin_user_id в которую помещено значение параметра username 
        //от переменной ассоц.массива $status_query_user
        $signin_user_id = $signin_query_user['id'];
         
        //объявлена новая переменная $signin_user_hash в которую помещено значение параметра username 
        //от переменной ассоц.массива $signin_query_user     
        //и объединяю значение с date функция возвращать значение указанное по параметрам 
        // с помощью точки строки объединяются переменные со строками 
        //в данном случае date выведет полное значение даты и времени например: 2017-12-...
        $signin_user_hash = $signin_query_user['username'].date("Y-m-d-H-i-s");
         
        //обновляю значение переменной $signin_user_hash на преобразованное функцией hash(шифр)вложенное значение 
        //в данном слчае шифруется по принципу sha256
        $signin_user_hash = hash('sha256',$signin_user_hash);
         
        //$  перед названием объявляет переменную в рhр или меняет значение ранне указаной 
         $query = mysql_query("
         INSERT INTO
         sessions(
            user_id, 
            hash, 
            ip 
         )VALUES(
                '$signin_user_id', 
                '$signin_user_hash', 
                '$ip'
                )",$db);
         //setcookie функция языка php объявляет сookie параметр
         //первым параметром указывается назвавние сookie параметра    
         //вторым параметром  указывается присваемое параметру сookie  
         setcookie("user_session", $signin_user_hash);
         
         
         //header функция языка php объявляет заголовки вывода HTTP заголовков
         //в ней мы устанавливаем переадресация на главную страницу
         header('Location:/');
         
         }else{
             $status_signin = false;
         
            }
        }
    
    }
}
                
        
?>
<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title>авторизация</title>
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    </head>    
    <body>
            <?php include ('module/template/navbar.php'); ?>
         
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-6">
                    
                <?php if(empty($_COOKIE['user_session'])){ ?>
                <div class="card">
                    <div class="card-body"> 


                        <h4 class="card-title">авторизация</h4>
                            <?php if(isset($status_signin)){?>
                                <?php if($status_sigin == true) {?>
                                <div class="alert alert-success" role="alert">
                                    Уcпех
                                </div>
                            <?php } else{?>
                                <div class="alert alert-danger" role="alert">
                                    Неудача
                                </div>
                                <?php }?>
                            <?php }?>
                        <form>
                            <div class="form-group">                        
                                <label> Логин</label>
                                <input type="text" class="form-control" placeholder="Введите логин" name="username" value="<?php echo $_REQUEST['username']; ?>">
                                <small class="form-text text-muted"> Только латинские буквы, цифры, дефисы и знаки подчеркивания   </small>
                            </div>       
                            <div class="form-group">
                                <label>Пароль</label>  
                                <input type="password" class="form-control" placeholder="Введите пароль" name="password" value="<?php echo $_REQUEST['name_first']; ?>">
                                <small class="form-text text-muted"> Только латинские буквы и цифры</small>
                            </div>
                                
                                <button type="submit" class="btn btn-primary" name="user-registration" value="true">Войти</button>
                            </form>

                        </div>
                    </div>
                    <?php }else{ ?>
                        <!--meta http-equiv="refresh" content=0;url=/" выполняет на главную страницу -->
                        <meta http-equiv="refresh" content="0;URL=/">
                    <?php } ?>

                </div>
            </div>   
        </div>
        
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="popper.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script type="text/javascript" src="bootstrap.min.js"></script>
    </body>     
</html>