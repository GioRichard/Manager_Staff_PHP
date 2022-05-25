<?php
    require_once './config.php';

    $id = $_GET["id"];

    $sql = "DELETE FROM `nhan_vien` WHERE `nhan_vien`.`Ma_Nhan_Vien` = $id";

    $result = mysqli_query($connect,$sql);

    

    if($result) {
        header("location:manage-employee-nhanvien.php");

    }else{ 
        echo "Lỗi khi xóa phần tử ".$id; 
    }

    
   
    
    
?>