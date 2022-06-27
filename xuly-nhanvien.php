<?php

    require_once 'config.php';
    session_start();

    
    if(!isset($_SESSION['ten_dang_nhap'])) {
        header("location:login.php");
    }

    $now = getdate();
    $currentDate = $now["year"]  . "-". $now["mon"]  . "-". $now["mday"];


    $count_employ = "SELECT Ma_Nhan_Vien FROM `nhan_vien` ";

    $result_employ = mysqli_query($connect,$count_employ);
    $dem = mysqli_num_rows($result_employ);
    for($i=1; $i <  $dem ; $i++) {
    $Ma_Nhan_Vien = $_GET["Ma_Nhan_Vien_$i"];

    
    $status = $_GET["$i"];
    
    $note = $_GET["note_$i"];

    $sql  = "INSERT INTO `diem_danh` (`Ma_Nhan_Vien`, `Ngay_Diem_Danh`, `GhiChu`, `Ma_Diem_Danh`, `Trang_Thai`)
             VALUES ('$Ma_Nhan_Vien', '$currentDate', '$note', NULL,  '$status')";
    $result = mysqli_query($connect,$sql);

    $so_ngay_lam = "SELECT Ma_Diem_Danh FROM  `diem_danh` inner join nhan_vien 
                                     on diem_danh.Ma_Nhan_Vien = nhan_vien.Ma_Nhan_Vien
                                    where diem_danh.Trang_Thai = 1 
                                    and nhan_vien.Ma_Nhan_Vien = '$Ma_Nhan_Vien'
                                    and month(Ngay_Diem_Danh) = month('$currentDate')
                                    ";
    
    $rsl_snl = mysqli_query($connect,$so_ngay_lam);
    $count = mysqli_num_rows($rsl_snl);
    echo "Kết quả ".$count;

    $sql_so_ngay_lam  ="UPDATE `nhan_vien` SET `So_Ngay_Lam` = '$count' WHERE `nhan_vien`.`Ma_Nhan_Vien` = '$Ma_Nhan_Vien'";
    $result_so_ngay_lam = mysqli_query($connect,$sql_so_ngay_lam);
    if($result) {
        echo "
             <script>
                alert('Bạn điểm danh  thành công !');
            </script>
            ";
            header("Location:attendance.php");
    }else{
        echo "
             <script>
                alert('Bạn điểm danh không thành công !');
            </script>
            ";
    }

}

?>