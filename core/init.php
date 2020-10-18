<?php
    $db = mysqli_connect('127.0.0.1','root','','remotorbike');
    if(mysqli_connect_errno()){
        echo 'Database Connection Failed with following errors: '.mysqli_connect_error();
        die();
    }
    require_once $_SERVER['DOCUMENT_ROOT'].'/proto-remotorbike/config.php';
    require_once BASEURL.'helpers/helpers.php';
?>


