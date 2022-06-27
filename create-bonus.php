<?php
    require_once 'config.php';
    if(isset($_POST['submit'])) {
        $ten_ktkl = $_POST['ten_ktkl'];
        $so_tien = $_POST['so_tien'];
        $sql = "INSERT INTO `khen_thuong_ki_luat` (`Ma_KT_KL`, `Ten_KT_KL`, `So_Tien`) 
        VALUES (NULL, '$ten_ktkl', '$so_tien')";
        $result = mysqli_query($connect, $sql);
        header("Location:manage-bonus-home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Thêm mới KTKL</title>
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
    <h2 class="mt-4">Khen thưởng kỉ luật</h2>
    <form action="" method="post" enctype="multipart/form">
        
        <div class="mb-3">
            <label for="ten_ktkl" class="form-label">Tên KTKL</label>
            <input type="text" class="form-control" name="ten_ktkl"  >
            
        </div>
        <div class="mb-3">
            <label for="so_tien" class="form-label">Tiền thưởng</label>
            <input type="text" class="form-control"   name="so_tien" placeholder="" >          
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>