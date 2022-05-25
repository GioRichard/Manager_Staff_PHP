<?php
    require_once 'config.php';

    session_start();
    $msg = "";
    if(isset($_POST['submit'])) {
        $name = $_SESSION['ten_dang_nhap'];

        $oldPassword = $_POST['oldPassword'];
        $currentPassword = $_POST['currentPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        $sql = "SELECT * FROM `tai_khoan` where `ten_dang_nhap` = '$name' and `mat_khau` = '$oldPassword'";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
        
        if($row > 0) {
            $ret =  mysqli_query($connect,"update tai_khoan set mat_khau = '$currentPassword' where `ten_dang_nhap` = '$name'");
            $msg =  "Password changed successfully";
            header("Location: nhanvien.php");
            
        }else{
            $msg = "Password not changed successfully";
        }

       
    }

?>
<script type="text/javascript">
    function checkpass() {
        if(document.changepassword.currentPassword.value != document.changepassword.confirmPassword.value ) {
            alert('Xác nhận mật khẩu không khớp');
            document.changepassword.confirmPassword.focus();
            return false;
        }
        return true;
    }
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quên mật khẩu</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Đổi mật khẩu</h3></div>
                                    <div class="card-body">
                                        
                                        <form action="" method="post" name="changepassword" onsubmit="return checkpass();"> 
                                        <span style="color:red;font-size:12px;"> <?php  echo $msg;  ?></span>

<?php
    
    $name = $_SESSION['ten_dang_nhap'];
    $sql = "SELECT * FROM tai_khoan where ten_dang_nhap = '$name'";
    $result = mysqli_query($connect,$sql);

    while($row = mysqli_fetch_assoc($result)) {
?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="oldPassword" name="oldPassword" placeholder="" type="password" placeholder="name@example.com" />
                                                <label for="oldPassword">Mật khẩu hiện tại</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="currentPassword" name="currentPassword" placeholder="" type="password" name@example.com" />
                                                <label for="currentPassword">Mật khẩu mới</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="confirmPassword" name="confirmPassword" placeholder="" type="password" placeholder="name@example.com" />
                                                <label for="confirmPassword">Nhập lại mật khẩu</label>
                                            </div>
                                            <?php }  ?>
                                            <input type="submit" class="form-control"   name="submit" value="Đổi mật khẩu">
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Bạn có tài khoản?Đăng nhập! </a></div>
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
