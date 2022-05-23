<?php
    require_once 'config.php';
    $usernameErr = $passwordErr = $fullnameErr = $imgErr
    = $username =$password = $fullname = $img = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
         // Xử lí validate form
         $username = $_POST['username'];
         $password = $_POST['password'];
         $fullname = $_POST['fullname'];
         $img = $_POST['img'];
        // username
        if(empty($username)) {
            $usernameErr = "Tên đăng nhập không được bỏ trống !";
            
        }else{
            $username = test($username);
            if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                $usernameErr = "Tên đăng nhập gồm chữ và số ";
            }
        }


    }
    if(isset($_POST['submit'])) {


      

        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $img = $_POST['img'];

       
 
        $sql = "INSERT INTO `tai_khoan` (`id`, `ten_dang_nhap`, `mat_khau`, `ten_nguoi_dung`, `anh_dai_dien`) VALUES (NULL, '$username', '$password', '$fullname', '$img')";

        $result = mysqli_query($connect, $sql);

        header("Location:manage-account.php");
    }

    // Hàm kiểm tra
    function test($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Thêm mới tài khoản</title>
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
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form">
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" name="username" placeholder=""  >
            <span > <?php echo $usernameErr;?></span>
        </div>
        <div class="mb-3">
            <label for="Mật khẩu" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="password"  >
            
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Tên người dùng</label>
            <input type="text" class="form-control"   name="fullname" placeholder="" >
            
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Ảnh đại diện</label>
            <input type="text" class="form-control" name="img"    >
            
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>