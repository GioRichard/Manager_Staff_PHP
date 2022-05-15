<?php
    require_once './config.php';

    $id = $_GET["id"];
    
    $sql_nhanvien = "DELETE FROM `nhan_vien` WHERE  `nhan_vien`.`Ma_Phong_Ban` = $id ";

    $result = mysqli_query($connect,$sql_nhanvien);
    
    $sql = "DELETE FROM `phong_ban` WHERE  `phong_ban`.`Ma_Phong_Ban` = $id ";
    $result = mysqli_query($connect,$sql);


    if($result) {
        header("location:manage-department.php");

    }else{ 
        echo "Lỗi khi xóa phần tử ".$id; 
    }

    
   
    
    
?>