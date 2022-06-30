<?php
    require_once './config.php';

    $id = $_GET["id"];
    

    $sql = "DELETE FROM `chuc_vu` WHERE `chuc_vu`.`Ma_Chuc_Vu` = $id";

    $result = mysqli_query($connect,$sql);


    if($result) {
        header("location:manage-position-nhanvien.php");

    }else{ 
        echo "Lỗi khi xóa phần tử ".$id; 
    }
  
?>