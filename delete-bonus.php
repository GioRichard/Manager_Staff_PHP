<?php
    require_once './config.php';

    $id = $_GET["id"];
    
    $sql_ktkl = "DELETE FROM `khen_thuong_ki_luat` WHERE  `khen_thuong_ki_luat`.`Ma_KT_KL` = '$id' ";

    $result = mysqli_query($connect,$sql_ktkl);
    if($result) {
        header("location:manage-bonus-home.php");

    }else{ 
        echo "Lỗi khi xóa phần tử ".$id; 
    }

    
   
    
    
?>