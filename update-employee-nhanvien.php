<?php
    require_once 'config.php';
    
        

        $id = $_GET['id'];
        
        $sql = "SELECT * FROM `nhan_vien` WHERE Ma_Nhan_Vien = $id";
    
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Thêm mới nhân viên</title>
    <style>
        * {
            max-width: 1000px;
            box-sizing: border-box;
            margin:  0 auto;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="mt-4">Cập nhật thông tin nhân viên</h2>
    <form action="" method="post" enctype="multipart/form">
        
        
        <div class="mb-3">
            <label for="ten_nhan_vien" class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control"   name="ten_nhan_vien" placeholder="" value="<?php echo $row['Ten_Nhan_Vien']; ?>">
            
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại </label>
            <input type="text" class="form-control" name="phone"   value="<?php echo $row['So_Dien_Thoai']; ?>" >
            
        </div>
        <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name="ngay_sinh" value="<?php echo $row['Ngay_Sinh']; ?>"  >
            
        </div>
        <div class="mb-3">
            <label for="dia_chi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control"   name="dia_chi" placeholder="" value="<?php echo $row['Dia_Chi']; ?>">
            
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control"   name="email" placeholder="" value="<?php echo $row['Email'];  ?>" >
            
        </div>
        <div class="mb-3">
            <label for="gioi_tinh" class="form-label">Giới tính</label>
            <input type="text" class="form-control"   name="gioi_tinh" placeholder="" value="<?php echo $row['Gioi_Tinh']; ?>" >
        </div>
        <div class="mb-3">
            <label for="chuc_vu" class="form-label"> Chức vụ</label>
            <input type="text" class="form-control"   name="chuc_vu" placeholder="" value="<?php echo $row['Ma_Chuc_Vu']; ?>" >
            
        </div>
        <div class="mb-3">
            <label for="phong_ban" class="form-label">Phòng ban</label>
            <input type="text" class="form-control"   name="phong_ban" placeholder="" value="<?php echo $row['Ma_Phong_Ban']; ?>">
            
        </div>
        <div class="mb-3">
            <label for="he_so_luong" class="form-label">Hệ số lương</label>
            <input type="text" class="form-control" name="he_so_luong"  value="<?php echo $row['He_So_Luong']; ?>"  >
            
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>

<?php

    if(isset($_POST['submit'])) {

        $id = $_GET['id'];
        
        $ten_nhan_vien=$_POST['ten_nhan_vien'];
        $phone = $_POST['phone'];
        $ngay_sinh = $_POST['ngay_sinh'];
        $dia_chi = $_POST['dia_chi'];
        $email = $_POST['email'];
        $gioi_tinh = $_POST['gioi_tinh'];
        $chuc_vu = $_POST['chuc_vu'];
        $phong_ban = $_POST['phong_ban'];
        $he_so_luong = $_POST['he_so_luong'];
        $sql = " UPDATE `nhan_vien` SET `Ten_Nhan_Vien` = '$ten_nhan_vien', `Ngay_Sinh` = ' $ngay_sinh ', `Dia_Chi` = ' $dia_chi',  `Email` = '$email', `So_Dien_Thoai` = '$phone', `Gioi_Tinh` = '$gioi_tinh', `Ma_Chuc_Vu` = '$chuc_vu', `Ma_Phong_Ban` = '$phong_ban',  `He_So_Luong` = '$he_so_luong' WHERE `nhan_vien`.`Ma_Nhan_Vien` = $id ";
    
        $result = mysqli_query($connect,$sql);
        
        header("Location:manage-employee-nhanvien.php");
    
    
    
    }



?>