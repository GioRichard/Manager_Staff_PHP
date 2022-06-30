<?php
    require_once 'config.php';
    $error = "";
    

    session_start();

    
    $usernameErr = "";
    $passwordErr = "";
    
    if(isset($_SESSION['ten_dang_nhap'])) {
        header("location:index.php");
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username)) {
            $usernameErr = "Tên đăng nhập không được để trống ";
        }else{
            if(!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
                $usernameErr = "Không được nhập ký tự đặc biệt ";
            }
        }
        if(empty($password)) {
            $passwordErr = "Mật không không được để trống ";
        }else {
            if(!preg_match("$^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$",$password)) {
                $passwordErr = "Mật khẩu chưa đúng định dạng";
            }
        }
    }
    
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $error = "";
        $sqlAdmin = "SELECT * FROM `tai_khoan` where ten_dang_nhap = '$username' and mat_khau = '$password' and chuc_nang = 1";
        $resultAdmin = mysqli_query($connect,$sqlAdmin);

        if(mysqli_num_rows($resultAdmin) > 0 ) {
            $_SESSION['username'] = $username;
            header("location:index.php");
        }else {
            
            $sql = "SELECT * FROM tai_khoan where ten_dang_nhap = '$username' and mat_khau = '$password' and chuc_nang != 1 ";
    
       
            $result = mysqli_query($connect,$sql);

            
            if(mysqli_num_rows($result) > 0) {
                $_SESSION['ten_dang_nhap']= $username ;
                header("Location:nhanvien.php");
            }else{
                $error = "Email hoặc số di động bạn nhập không kết nối với tài khoản nào";
                
            }
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
        <title>Đăng nhập</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action = "" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" type="text" placeholder="name@example.com" />
                                                <label for="inputEmail">Tên đăng nhập</label>
                                                <span style="color:red"> <?php echo $usernameErr; ?></span>
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Mật khẩu</label>
                                                <span style="color:red"> <?php echo $passwordErr; ?></span>
                                                
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" name="RememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="RememberPassword">Nhớ mật khẩu</label>
                                            </div> -->
                                            <div class="form-check mb-3">
                                                <span><?php  echo $error;  ?></span>
                                            </div>
                                            <div>
                                                
                                                <input style="width:100%; height: 45px; text-align: center;" class="btn btn-primary" type="submit" name="submit" value="Login">
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Bạn chưa có tài khoản? Đăng ký!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
