<?php
    require_once 'config.php';
    session_start();
    $msg = "";
    if(isset($_POST['submit']))  {
        $name = $_SESSION['username'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE tbladmin SET username= '$username', password = '$password', adminName = '$fullname',phone= '$phone', email = '$email' where username = '$name'";


        $result = mysqli_query($connect, $sql);
    
        if($result) {
            $msg = "Tài khoản admin đã được cập nhật";
        }else{
            $msg = "Tài khoản admin chưa được cập nhật";
        }

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
                    <input class="form-control" type="text" placeholder="Tìm kiếm..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
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
                            <a class="nav-link" href="./manage-employee.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý nhân viên
                            </a>
                            <a class="nav-link" href="./report.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Thống kê báo cáo
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <span> Công ty DKP</span>
                    </div>
                </nav>
            </div>
            <div class="container">
                <h2 class="mt-4">Thông tin tài khoản</h2>
                <span style="color:red"><?php echo $msg;  ?></span>
                <form action="" method="post" enctype="multipart/form">

<?php

    $name = $_SESSION['ten_dang_nhap'];
    $sql = "SELECT * FROM `tai_khoan` where `ten_dang_nhap` = '$name'";
    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
     
    
?>
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
                        <label for="email" class="form-label">Ảnh đại diện</label>
                        <input type="text" class="form-control" name="email"    value="<?php echo $row['anh_dai_dien']; ?>">
                        
                    </div>
                    
                    <?php   } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                    
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
