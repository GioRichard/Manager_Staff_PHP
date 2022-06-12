<?php
    session_start();

    if(isset($_SESSION['ten_dang_nhap'])) {
        unset($_SESSION['ten_dang_nhap']);
    }
    header('Location:login.php');


    
    
?>