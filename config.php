<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'quan_ly_nhan_vien';


    $connect = mysqli_connect($servername,$username,$password,$database);

    if(!$connect) {
        die("Could not connect to".mysqli_connect_error());
    }

    
?>