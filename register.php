<?php
    require_once 'config.php';
    $errFirstName = "";
    $errLastName = "";
    $errUserName = "";
    $errPassword = "";
    $errRePassword = "";
    $err = "";
    if(isset($_POST['submit'])) {
        $repassword = input_data($_POST['inputPasswordConfirm']);
        $password = input_data($_POST['inputPassword']);
        $firstname = input_data($_POST['inputFirstName']);
        $lastname = input_data($_POST['inputLastName']);  
        $username = input_data($_POST['inputUsername']);

        if (empty($_POST["inputFirstName"])) {  
            $errFirstName = "Không được bỏ trống trường này";  
        } else {  
               
               if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {  
                   $errFirstName = "Họ đệm chỉ gồm chữ và khoảng trắng";  
               }  
        }
        if (empty($_POST["inputLastName"])) {  
            $errLastName = "Không được bỏ trống trường này";  
        } else {  
             
            if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {  
                $errLastName = "Tên chỉ gồm chữ và khoảng trắng";  
            }  
        }
        if (empty($_POST["inputUsername"])) {  
            $errUserName = "Không được bỏ trống trường này";  
        } else {  
               
            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {  
                $errUserName = "Tên đăng nhập chỉ gồm chữ và số";  
            }  
        }
        if (empty($_POST["inputPassword"])) {  
            $errPassword = "Không được bỏ trống trường này";  
        } else {  
               
            if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {  
                $errPassword = "Mật khẩu chỉ gồm chữ và số";  
            }  
        }
        if( strcmp($password, $repassword) != 0) {
            $errRePassword = "Xác nhận mật khẩu không đúng";
        }
        

        $name = $firstname . " " . $lastname;
        if ($errFirstName == "" && $errLastName == "" && $errUserName == "" && $errPassword == "" && $errRePassword == "")
            {
            $sql = "SELECT * FROM tai_khoan where ten_dang_nhap = '$username' ";

            $result = mysqli_query($connect,$sql);
            //$password = md5($password);
            $dem = mysqli_num_rows($result);
            
            if($dem > 0) {
                $err = "Tên đăng nhập đã tồn tại.";
                //header("Location:register.php");
            }else {
                $sqlAll = "INSERT INTO tai_khoan (id, ten_dang_nhap, mat_khau, ten_nguoi_dung, anh_dai_dien) VALUES (NULL, '$username', '$password', '$name', '')";

                mysqli_query($connect,$sqlAll);
                header("location:login.php");
            }
        }
    }
    function input_data($data) {  
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
        <title>Đăng ký</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            span{
                color: red;
            }
        </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tạo tài khoản</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST"> 
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Họ đệm</label>
                                                        <br>
                                                        <span>
                                                            <?php echo $errFirstName; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Tên</label>
                                                        <br>
                                                        <span>
                                                            <?php echo $errLastName; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" name="inputUsername" type="text" placeholder="Enter your username"  />
                                                <label for="inputUsername">Tên đăng nhập</label>
                                                <br>
                                                <span>
                                                    <?php echo $errUserName; ?>
                                                </span>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Mật khẩu</label>
                                                        <br>
                                                        <span>
                                                            <?php echo $errPassword; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Xác nhận mật khẩu</label>
                                                        <br>
                                                        <span>
                                                            <?php echo $errRePassword; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span>
                                                <?php echo $err; ?>
                                            </span>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                <input style="width:100%; height: 45px; text-align: center;" class="btn btn-primary" type="submit" name="submit" value="Tạo tài khoản">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="./login.php">Bạn có tài khoản? Đăng nhập !</a></div>
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