<?php
    require_once './config.php';

    $id = $_GET["id"];
    $sql1 = "DELETE FROM `diem_danh` WHERE `diem_danh`.`Ma_Nhan_Vien` = $id";

    $result1 = mysqli_query($connect,$sql1);

    $sql = "DELETE FROM `nhan_vien` WHERE `nhan_vien`.`Ma_Nhan_Vien` = $id";

    $result = mysqli_query($connect,$sql);

    

    if($result) {
        header("location:manage-employee-nhanvien.php");

    }else{ 
        echo "Lỗi khi xóa phần tử ".$id; 
    }

    
   
    
    
?>