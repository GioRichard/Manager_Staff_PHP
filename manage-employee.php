<?php

    require_once 'config.php';
    session_start();

    
    if(!isset($_SESSION['username'])) {
        header("location:login.php");
    }

    $sql =  "SELECT * FROM `nhan_vien` ";
    

    $result = mysqli_query($connect,$sql);
    $maphongban= $machucvu = "";
    

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
        <style>
            
            a {
                text-decoration: none;
                list-style-type: none;
                
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
                        <li><a class="dropdown-item" href="./information.php">Thông tin cá nhân</a></li>
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
            
            <div id="layoutSidenav_content" style="margin-left: 30px;">
                <h1 class="mt-4" style="text-align: center;">Quản lý nhân viên</h1>

                
                
                <div style="display: flex; justify-content:space-between;margin-right:50px;">
                        <button style="max-width:100px;"><a href="./create-employee.php">Thêm mới</a></button>
                        <form method="post" action="export.php">
                                <input type="submit" name="export-employee" class="btn btn-success" value="Export" />
                        </form>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Mã Nhân Viên</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                <th>Chức vụ</th>
                                <th>Phòng <br>ban</th>
                                <th>Số ngày làm</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) { 
                                        $employeeId = $row['Ma_Nhan_Vien'];
                                        $maphongban = $row['Ma_Phong_Ban'];
                                        $machucvu = $row['Ma_Chuc_Vu'];

                                        $sql1 = "SELECT * FROM `phong_ban` where Ma_Phong_Ban = '$maphongban'";
                                        $result1 = mysqli_query($connect,$sql1);
                                        $row1 = mysqli_fetch_array($result1);

                                        $sql2 = "SELECT * FROM `chuc_vu` where Ma_Chuc_Vu = '$machucvu'";
                                        $result2 = mysqli_query($connect,$sql2);
                                        $row2 = mysqli_fetch_array($result2);

                                        echo "<tr>
                                    
                                        <td>{$row['Ma_Nhan_Vien']}</td>
                                        <td>{$row['Ten_Nhan_Vien']}</td>
                                        <td>{$row['Ngay_Sinh']}</td>
                                        <td>{$row['Dia_Chi']}</td>
                                        <td>{$row['Email']}</td>
                                        <td>{$row['So_Dien_Thoai']}</td>
                                        <td>{$row['Gioi_Tinh']}</td>
                                        <td>{$row2['Ten_Chuc_Vu']}</td>
                                        <td>{$row1['Ten_Phong_Ban']}</td>
                                        <td>{$row['So_Ngay_Lam']}</td>
                                        <td>
                                            <div style='display:flex;'>
                                                <button style='margin-right:10px;' type='button' class='btn btn-outline-primary' > <a href='update-employee.php?id={$row['Ma_Nhan_Vien']}' style='text-decoration: none;'>Sửa </a></button>
                                                <button type='button' class='btn btn-outline-danger'><a onclick='getConfirm(this, $employeeId)' style='text-decoration: none; color:red;'>Xóa </a></button>
                                            </div>
                                        </td>
                                    </tr>";

                                    } 
                                ?>
                            </tbody>
                        
                    </table>
                </div>
                <hr>
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
        <script type="text/javascript" >
            function  getConfirm(aTag, empId) {
                const conf = confirm('Bạn có muốn xóa nhân viên này không ?');
                if(!conf) {
                    aTag.href = '';
                } else {
                    aTag.href = 'delete-employee.php?id=' +  empId ;
                }
                console.log(aTag);
            }
        </script>
    </body>
</html>

<?php
    


?>
