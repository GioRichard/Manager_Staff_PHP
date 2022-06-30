<?php
    require_once 'config.php';

   
        $id = $_GET['id'];

        $sql = "SELECT * FROM `tai_khoan` where id=$id";

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
    <title>Sửa thông tin tài khoản</title>
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
    <h2 class="mt-4">Thêm mới tài khoản</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" name="username" placeholder="" value="<?php echo $row['ten_dang_nhap']; ?>">
            
        </div>
        <div class="mb-3">
            <label for="Mật khẩu" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="password"  value="<?php echo $row['mat_khau']; ?>">
            
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Tên người dùng</label>
            <input type="text" class="form-control"   name="fullname" placeholder="" value="<?php echo $row['ten_nguoi_dung']; ?>">
            
        </div>
        <div class="mb-3">
        <label for="img" class="form-label">Ảnh đại diện</label>
            <input type="file" name="fileUpload" value="<?php echo $row['anh_dai_dien']; ?>" id="fileUpload" >
            
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>

<?php
    
    if(isset($_POST['submit'])) {
        $id = $_GET['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $img = $_FILES['fileUpload']['name'];
        
        $file = $_FILES['fileUpload']['tmp_name'];
        $path = "uploads/".$_FILES['fileUpload']['name'];
        if(move_uploaded_file($file, $path)){
            echo "Tải tập tin thành công";
        }else{
            echo "Tải tập tin thất bại";
        }
        $sql = "UPDATE `tai_khoan` SET  `ten_dang_nhap` = ' $username',`mat_khau` = '$password', `ten_nguoi_dung` = ' $fullname', `anh_dai_dien` = '$img' WHERE `tai_khoan`.`id` = $id";
        
        
        $result = mysqli_query($connect,$sql);
        
        header("Location:manage-account.php");
    }

?>