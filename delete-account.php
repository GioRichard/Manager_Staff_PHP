
<?php
    require_once './config.php';

    $id = $_GET["id"];
    $sql = "DELETE FROM tai_khoan  WHERE id = $id";

    $result = mysqli_query($connect,$sql);

    

    if($result) {
        
        header("location:manage-account.php");

    }else{ 
        echo "Lỗi khi xóa phần tử ".$id; 
    }

    
   
    
    
?>