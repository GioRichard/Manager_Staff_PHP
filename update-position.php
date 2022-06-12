<?php
    require_once 'config.php';

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM `chuc_vu` where Ma_Chuc_Vu = $id";
    
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
    <title>Thêm mới chức vụ</title>
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
    <h2 class="mt-4">Cập nhật chức vụ</h2>
    <form action="" method="post" enctype="multipart/form">
        
        <div class="mb-3">
            <label for="ten_chuc_vu" class="form-label">Tên chức vụ</label>
            <input type="text" class="form-control" name="ten_chuc_vu" value="<?php echo $row['Ten_Chuc_Vu'];  ?>" >
            
        </div>
        <div class="mb-3">
            <label for="he_so_chuc_vu" class="form-label">Hệ số chức vụ</label>
            <input type="text" class="form-control"   name="he_so_chuc_vu" placeholder=""  value="<?php echo $row['He_So_Chuc_Vu'];  ?>">
            
        </div>
        

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $id = $_GET['id'];

        $ten_chuc_vu = $_POST['ten_chuc_vu'];
        $he_so_chuc_vu = $_POST['he_so_chuc_vu'];
        
        $sql = "UPDATE `chuc_vu` SET `Ten_Chuc_Vu` = '$ten_chuc_vu', `He_So_Chuc_Vu` = '$he_so_chuc_vu' 
        WHERE `chuc_vu`.`Ma_Chuc_Vu` = '$id'";

        
        $result = mysqli_query($connect,$sql);
        
        header("Location:manage-position.php");

    }

?>