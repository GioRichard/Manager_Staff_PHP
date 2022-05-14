<?php
    require_once 'config.php';
    if(isset($_POST['submit'])) {
        //$ma_nhan_vien=$_POST['ma_nhan_vien'];
        $ten_nhan_vien=$_POST['ten_nhan_vien'];
        $phone = $_POST['phone'];
        $ngay_sinh = $_POST['ngay_sinh'];
        $dia_chi = $_POST['dia_chi'];
        $email = $_POST['email'];
        $gioi_tinh = $_POST['gioi_tinh'];
        $chuc_vu = $_POST['chuc_vu'];
        $phong_ban = $_POST['phong_ban'];
        $luong_co_ban = $_POST['luong_co_ban'];
    
        $sql = "INSERT INTO `nhan_vien` (`Ma_Nhan_Vien`, `Ten_Nhan_Vien`, `Ngay_Sinh`, `Dia_Chi`, `Email`, `So_Dien_Thoai`, `Gioi_Tinh`, `Ma_Chuc_Vu`, `Ma_Phong_Ban`, `Luong_Co_Ban`)
         VALUES (NULL, '$ten_nhan_vien', '$ngay_sinh', '$dia_chi', '$email', '$phone', '$gioi_tinh', '$chuc_vu', '$phong_ban', '$luong_co_ban')";
    
        $result = mysqli_query($connect, $sql);
        header("Location:manage-employee.php");
    }

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
    <h2 class="mt-4">Thêm mới nhân viên</h2>
    <form action="" method="post" enctype="multipart/form">
        
        <!-- <div class="mb-3">
            <label for="ma_nhan_vien" class="form-label">Mã nhân viên</label>
            <input type="text" class="form-control" name="ma_nhan_vien"  >
            
        </div> -->
        <div class="mb-3">
            <label for="ten_nhan_vien" class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control"   name="ten_nhan_vien" placeholder="" >
            
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại phòng</label>
            <input type="text" class="form-control" name="phone"    >
            
        </div>
        <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name="ngay_sinh"  >
            
        </div>
        <div class="mb-3">
            <label for="dia_chi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control"   name="dia_chi" placeholder="" >
            
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control"   name="email" placeholder="" >
            
        </div>
        <div class="mb-3">
            <label for="gioi_tinh" class="form-label">Giới tính</label>
            <input type="text" class="form-control"   name="gioi_tinh" placeholder="" >
        </div>
        <div class="mb-3">
            <label for="chuc_vu" class="form-label"> Chức vụ</label>
            <input type="text" class="form-control"   name="chuc_vu" placeholder="" >
            
        </div>
        <div class="mb-3">
            <label for="phong_ban" class="form-label">Phòng ban</label>
            <input type="text" class="form-control"   name="phong_ban" placeholder="" >
            
        </div>
        <div class="mb-3">
            <label for="luong_co_ban" class="form-label">Lương cơ bản</label>
            <input type="text" class="form-control" name="luong_co_ban"    >
            
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>