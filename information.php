<?php
    require_once 'config.php';
    session_start();
    $usernameErr = $passwordErr = $fullnameErr = $imgErr
    = $username =$password = $fullname = $img = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $error = "";
        $target_dir = "uploads/";
        // Tạo đường dẫn file sau khi uploads
        $target_file = $target_dir.basename($_FILES['fileUpload']['name']);
        //echo $target_file;

        // Kiểm tra điều kiện uploads 
        //1. Kiểm tra kích thước file 

        if($_FILES['fileUpload']['size'] > 3145728) {
            $error['fileUpload'] = "Chỉ được upload file dưới 3mb";
        }
        //2. kiểm tra loại file
        $file_type = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
        //echo $file_type;
       
        $file_type_allow = array('png','jpeg','jpg','pdf','gif');

        if(!in_array( strtolower($file_type), $file_type_allow)) {
            $error['fileUpload'] = "Chỉ cho phép upload file ảnh";
        }
        // 3. kiểm tra sự tồn tại file 
        //  if(file_exists($target_file)) {
        //      $error['fileUpload'] = "File đã tồn tại trong hệ thống";
        //      header('Location:create-account.php'); 
        //  }
        if(empty($error)) { 
            if(move_uploaded_file($_FILES['fileUpload']['tmp_name'],$target_file)) {
                echo "Bạn đã upload thành công";
                $flag = true;
            }else{
                echo "Bạn đã upload thất bại";
            }
        }
        



    }
    if(isset($_POST['submit'])) {
        $name = $_SESSION['username'];
        $username = $_POST['username'];
        
        $fullname = $_POST['fullname'];
        $img = $_FILES['fileUpload']['name'];

 
        $sql = "UPDATE `tai_khoan` SET   `ten_nguoi_dung` = ' $fullname', `anh_dai_dien` = '$img' where `ten_dang_nhap` = '$name'";

        $result = mysqli_query($connect, $sql);

        //$_SESSION['username'] = $username;
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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cong ty quan ly nhan su</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .container {
                margin: 50px auto ;
                max-width: 1000px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">
                <img class="header-logo" width="120px" height="60px" style="margin-left: 30px;" src="./assets/img/Logo1.png" alt="">    
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Tìm kiếm..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./password.php">Đổi mật khẩu</a></li>
                        <li><a class="dropdown-item" href="information.php">Thông tin cá nhân</a></li>
                        <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Trang chủ
                            </a>
                            <a class="nav-link" href="./manage-account.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý tài khoản
                            </a>
                            <a class="nav-link" href="./manage-department.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý phòng ban
                            </a>
                            <a class="nav-link" href="./manage-position.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý chức vụ
                            </a>
                            <a class="nav-link" href="./manage-employee.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý nhân viên
                            </a>
                            <a class="nav-link" href="./manage-bonus.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý thưởng phạt
                            </a>
                            <a class="nav-link" href="./salary.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý lương
                            </a>
                            <a class="nav-link" href="./attendance.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Điểm danh
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <span> Công ty DKP</span>
                    </div>
                </nav>
            </div>
            <div class="container">
                <h2 class="mt-4" style="text-align:center;">Thông tin tài khoản</h2>
                <!-- <span style="color:red"><?php echo $msg;  ?></span> -->
                <form action="" method="post" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

<?php

    $name = $_SESSION['username'];
    $sql = "SELECT * FROM `tai_khoan` where `ten_dang_nhap` = '$name'";
    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
     
    
?>
                    <div class="mb-3">
                        <label for="username" class="form-label" >Tên đăng nhập</label>
                        <span  class="form-control"   value=""><?php echo $row['ten_dang_nhap']; ?></span>
                        
                    </div>
                    
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control"   name="fullname" placeholder="" value="<?php echo $row['ten_nguoi_dung']; ?>">
                        
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="fileUpload" value="" id="fileUpload" >
                        
                    </div>
                    
                    <?php   } ?>
                    <div style="text-align:center;">
                        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                    
                    
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>