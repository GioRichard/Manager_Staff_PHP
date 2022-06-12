<?php
    require_once 'config.php';
    session_start();

    
    if(!isset($_SESSION['ten_dang_nhap'])) {
        header("location:login.php");
    }

    if(isset($_POST['submitLcb'])) {
        $lcb =  $_POST['lcb'];

        $sql = "UPDATE luong SET Luong_Co_Ban = '$lcb' ";
        $result = mysqli_query($connect,$sql);
        //$rowLcb = mysqli_fetch_array($result);
        
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
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
                        <li><a class="dropdown-item" href="./password-nhanvien.php">Đổi mật khẩu</a></li>
                        <li><a class="dropdown-item" href="./information-nhanvien.php">Thông tin cá nhân</a></li>
                        <li><a class="dropdown-item" href="./login.php">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="nhanvien.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Trang chủ
                            </a>
                            
                            <a class="nav-link" href="./manage-department-nhanvien.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý phòng ban
                            </a>
                            <a class="nav-link" href="./manage-position-nhanvien.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý chức vụ
                            </a>
                            <a class="nav-link" href="./manage-employee-nhanvien.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý nhân viên
                            </a>
                            <a class="nav-link" href="./manage-bonus-nhanvien.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý thưởng phạt
                            </a>
                            <a class="nav-link" href="./salary-nhanvien.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản lý lương
                            </a>
                            <a class="nav-link" href="./attendance-nhanvien.php">
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
            
            <div id="layoutSidenav_content">
                <h1 class="mt-4" style="text-align:center;margin-bottom: 30px">Quản lý lương</h1>
                     
                        <form action="" method="post" enctype="multipart/form">
                            <h4 >Lương cơ bản: </h4>
                            <input type="text" name="lcb" placeholder="" value="">
                            <input type="submit" name="submitLcb" value="Nhập">
                        </form>

                
                <div class="row">
                    <!-- <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <a href="" style="text-decoration: none; color: white;">Thống kê theo tháng</a> 
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <a href="./export.php" style="text-decoration: none; color: white;">Xuất file excel</a>
                            </div>
                        </div>
                    </div> -->
                    <div class="card-body">
                        <form action = "" method="get">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Mã KTKL</th>
                                        <th>Hệ số chức vụ</th>
                                        <th>Số ngày làm</th>
                                        <th>Lương cơ bản</th>
                                        <th>Lương thực tế</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                        $sql = "SELECT * FROM nhan_vien";
                                        $result = mysqli_query($connect,$sql);
                                        
                                        while($row = mysqli_fetch_assoc($result)) { 
                                            $cv = $row['Ma_Chuc_Vu'];
                                            $id = $row['Ma_Nhan_Vien'];
                                            $sql1 = "SELECT * FROM chuc_vu where Ma_Chuc_Vu = '$cv'";
                                            $result1 = mysqli_query($connect,$sql1);
                                            $row1 = mysqli_fetch_assoc($result1);
                                            
                                            $sql2 = "SELECT * FROM luong ";
                                            $result2 = mysqli_query($connect,$sql2);
                                            $row2 = mysqli_fetch_assoc($result2);

                                            $sql3 = "select * from khen_thuong_ki_luat";
                                            $result3 = mysqli_query($connect,$sql3);
                                            $row3 = mysqli_fetch_assoc($result3);

                                            $salary =$row2['He_so_luong'] * $row2['Luong_Co_Ban'] * $row['So_Ngay_Lam'] * $row1['He_So_Chuc_Vu'] ;
                                            $salary += $row3['So_Tien'];
                                            
                                            echo "<tr>                                   
                                                <td>{$row['Ma_Nhan_Vien']}</td>
                                                <td>{$row['Ten_Nhan_Vien']}</td>
                                                <td>{$row['Ma_KT_KL']}</td>
                                                <td>{$row1['He_So_Chuc_Vu']}</td>
                                                <td>{$row['So_Ngay_Lam']}</td>
                                                <td>{$row2['Luong_Co_Ban']}</td>
                                                <td>{$salary}</td>
                                            </tr>";
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div style="display: block; text-align: center;">
                                <a style="text-decoration: none;" href="#">Chính sách bảo mật</a>
                                <span style="display: block; text-align: center;">Bản quyền bởi công ty DKP</span>
                        </div>
                    </div>
                </footer>
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
