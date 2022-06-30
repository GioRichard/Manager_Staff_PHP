<?php
    require_once 'config.php';
    session_start();

    
    if(!isset($_SESSION['username'])) {
        header("location:login.php");
    }
    $sql =  "SELECT * FROM `tai_khoan`";

    $result = mysqli_query($connect,$sql);

    $sql_account = "SELECT id FROM `tai_khoan`  ";
    $result_account = mysqli_query($connect,$sql_account);

    $dem_account = mysqli_num_rows($result_account);

    $sql_depart = "SELECT Ma_Phong_Ban FROM `phong_ban`";
    $result_depart = mysqli_query($connect,$sql_depart);

    $dem_depart = mysqli_num_rows($result_depart);

    $sql_employ = "SELECT Ma_Nhan_Vien FROM `nhan_vien`";
    $result_employ = mysqli_query($connect,$sql_employ);

    $dem_employ = mysqli_num_rows($result_employ);  

    $sql_position = "SELECT Ma_Chuc_Vu FROM `chuc_vu`";
    $result_position = mysqli_query($connect,$sql_position);

    $dem_position = mysqli_num_rows($result_position); 

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
            .num-account {
                font-style: bold;
                font-size: 30px;
                text-align: right;
                margin-right: 30px;
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
                        <li><a class="dropdown-item" href="information.php">Thông tin tài khoản</a></li>
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
                                Quản lí tài khoản
                            </a>
                            
                           
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <span> Công ty DKP</span>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="text-align: center; margin-bottom: 30px;">Quản lí tài khoản</h1>
                        <div style="display: flex; justify-content:space-between;margin-right:50px;">
                        <button style="max-width:100px;"><a  style="color:black;text-decoration:none;"  href="./create-account.php">Thêm mới</a></button>
                        <form method="post" action="export.php">
                                <input type="submit" name="export" class="btn btn-success" value="Export" />
                        </form>
                    </div>
                        <div class="row">
                            
                           
                          
                            
                        </div>
                        <div class="card-body">
                        <form action = "" method="GET">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Số thứ tự</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Mật khẩu</th>
                                        <th>Tên người dùng</th>
                                        <th>Ảnh đại diện</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php
                               $count= 0;
                                    while($row = mysqli_fetch_assoc($result)) { 
                                        $count ++;
                                        $accountId = $row['id'];
                                        echo "<tr>
                                            <td>{$count}</td>
                                        
                                        <td>{$row['ten_dang_nhap']}</td>
                                        <td>{$row['mat_khau']}</td>
                                        <td>{$row['ten_nguoi_dung']}</td>
                                        <td><img src='uploads/{$row['anh_dai_dien']}' style='width:100px; height:100px;'></td>
                                        
                                        <td>
                                            <div style='display:flex;'>
                                                <button style='margin-right:10px;' type='button' class='btn btn-outline-primary' > <a href='update-account.php?id={$row['id']}' style='text-decoration: none;'>Sửa </a></button>
                                                <button type='button' class='btn btn-outline-danger'><a onclick='getConfirm(this, $accountId)' style='text-decoration: none; color:red;'>Xóa </a></button>
                                            </div>
                                        </td>
                                    </tr>";

                                    } 
                                ?>
                                </tbody>
                                
                            </table>
                        </form>
                        
                    </div>
                        
                    </div>
                </main>
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
        <script>
            function  getConfirm(aTag, empId) {
                const conf = confirm('Bạn có muốn xóa tài khoản này không ?');
                if(!conf) {
                    aTag.href = '';
                } else {
                    aTag.href = 'delete-account.php?id=' +  empId ;
                }
                console.log(aTag);
            }
        </script>
    </body>
</html>
