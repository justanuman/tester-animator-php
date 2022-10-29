<?php
// isset проверка на наличие 
    if(isset($_COOKIE['user_session'])){
        // переменая $session_hash приравнивается к кукисам сесии юзера
        $session_hash = $_COOKIE['user_session'];
        $session_ip = $_SERVER['REMOTE_ADDR'];
        // переменная $query_check равна $session_hash 
        $query_check = mysql_query("
            SELECT 
                * 
            FROM 
                sessions 
            WHERE 
                hash = '$session_hash' 
            AND 
                ip = '$session_ip' 
            ",$db);
        // if условный оператор 
        // если переменная $query_check равна 1 то
        // mysql_num_rows считает кол во строчек
        // если только одна строчка то сессия подтрверждена
        if(mysql_num_rows($query_check) == 1){
            
           $global_sessions_status = true; 
            // или нет
        }else{
            
            $global_sessions_status = false;
            
        }
    
    }
?>