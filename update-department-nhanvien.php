<?php
    require_once 'config.php';

    $id = $_GET['id'];
    
     $sql = "SELECT * FROM `phong_ban` where Ma_Phong_Ban = $id";
    
     $result =mysqli_query($connect,$sql);

     $row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Thêm mới phòng ban</title>
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
    <h2 class="mt-4">Cập nhật phòng ban</h2>
    <form action="" method="post" enctype="multipart/form">
        
        <div class="mb-3">
            <label for="ten_phong_ban" class="form-label">Tên phòng ban</label>
            <input type="text" class="form-control" name="ten_phong_ban" value="<?php echo $row['Ten_Phong_Ban'];  ?>" >
            
        </div>
        <div class="mb-3">
            <label for="ma_truong_phong" class="form-label">Mã trưởng phòng</label>
            <input type="text" class="form-control"   name="ma_truong_phong" placeholder=""  value="<?php echo $row['Ma_Truong_Phong'];  ?>">
            
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại phòng</label>
            <input type="text" class="form-control" name="phone"  value="<?php echo $row['So_Dien_Thoai_Phong'];  ?>"  >
            
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $id = $_GET['id'];

        $ten_phong_ban = $_POST['ten_phong_ban'];
        $ma_truong_phong = $_POST['ma_truong_phong'];
        $phone = $_POST['phone'];
        $sql = "UPDATE `phong_ban` SET `Ten_Phong_Ban` = '$ten_phong_ban', `Ma_Truong_Phong` = '$ma_truong_phong', 
        `So_Dien_Thoai_Phong` = '$phone'WHERE `phong_ban`.`Ma_Phong_Ban` = $id";

        
        $result = mysqli_query($connect,$sql);
        
        header("Location:manage-department-nhanvien.php");

    }

?>