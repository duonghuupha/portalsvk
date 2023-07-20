<?php
if(!isset($_SESSION['lang'])){
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'svkherbal_vi');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}else{
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'svkherbal_en');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}
?>
