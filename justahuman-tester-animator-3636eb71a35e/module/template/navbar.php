<nav class="navbar navbar-expand navbar-dark bg-primary">

    <a class="navbar-brand" href="/">tester-animator</a>
        <img src="ii.png" width="30" height="30" class="d-inline-block align-top" alt="">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item">    
                    <a class="nav-link" href="/">Главная</a>
                </li>
                
                <?php
                    // if условный оператор если условие в круглых скобках
                    // если результат условия верный  выполняется действие указанное в фигурных скобках
                    // empty(...) проверяет на пустое значение указанной переменной или её существование в принципе
                    // функция empty возваращает true если указанная переменная существует и false если нет
                    // $_COOKIE глобальный массив в данном случае вызывается параметр user_session из этого массива
                    if(empty($_COOKIE['user_session'])){
                ?>
                <li class="nav-item">    
                    <a class="nav-link" href="/signup.php">Регистрация</a>
                </li>
                <li class="nav-item">    
                    <a class="nav-link" href="/signin.php">Вход</a>
                </li>
                <?php
                    //else дополнение к оператору if которыйвыполняет указанное в фигурных скобках действие
                    //при условии обратному условию if
                    }else{
                        
                        
                ?>
                <li class="nav-item">    
                    <a class="nav-link" href="/signout.php">выход</a>
                </li>
                <?php } ?>
        </ul> 
         
    </div>

</nav>