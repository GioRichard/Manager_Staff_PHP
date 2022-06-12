<?php
    require_once 'config.php';
    $output = "";

    if(isset($_POST["export"])) {
        $sql = "SELECT * FROM tai_khoan ORDER By id ASC";
        $result = mysqli_query($connect,$sql);

        if(mysqli_num_rows($result) > 0) {
                $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  
                                            <th>STT</th>  
                                            <th>Tên đăng nhập</th>  
                                            <th>Mật khẩu</th>  
                                            <th>Tên người dùng</th> 
                                            <th>Ảnh đại diện</th> 
                                            
                        
                                        </tr>
                ';
                while($row = mysqli_fetch_array($result)) {
                    $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  "
                                            <td>'.$row["id"].'</td>  
                                            <td>'.$row["ten_dang_nhap"].'</td>
                                            <td>'.$row["mat_khau"].'</td>
                                            <td>'.$row["ten_nguoi_dung"].'</td>
                                            <td>'.$row["anh_dai_dien"].'</td>
                                        </tr>
                    ';
                }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=export-account.xls');
            echo $output;
        }
    }
    if(isset($_POST["export-depart"])) {
        $sql = "SELECT * FROM phong_ban ORDER By Ma_phong_Ban ASC";
        $result = mysqli_query($connect,$sql);

        if(mysqli_num_rows($result) > 0) {
                $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  
                                            <th>Mã phòng ban</th>  
                                            <th>Tên phòng ban</th>  
                                            <th>Mã trưởng phòng</th>  
                                            <th>Số điện thoại phòng</th> 
                                             
                                            
                        
                                        </tr>
                ';
                while($row = mysqli_fetch_array($result)) {
                    $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  "
                                            <td>'.$row["Ma_Phong_Ban"].'</td>  
                                            <td>'.$row["Ten_Phong_Ban"].'</td>
                                            <td>'.$row["Ma_Truong_Phong"].'</td>
                                            <td>'.$row["So_Dien_Thoai_Phong"].'</td>
                                            
                                        </tr>
                    ';
                }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=export-department.xls');
            echo $output;
        }
    }
    if(isset($_POST["export-employee"])) {
        $sql = "SELECT * FROM nhan_vien ORDER By Ma_Nhan_Vien ASC";
        $result = mysqli_query($connect,$sql);

        if(mysqli_num_rows($result) > 0) {
                $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  
                                            <th>Mã Nhân Viên</th>  
                                            <th>Tên Nhân Viên</th>  
                                            <th>Ngày Sinh</th>  
                                            <th>Địa Chỉ</th> 
                                            <th>Email</th> 
                                            <th>Số Điện Thoại</th> 
                                            <th>Giới Tính</th> 
                                            <th>Mã Chức Vụ</th> 
                                            <th>Mã Phòng Ban</th> 
                                            <th>Lương cơ bản</th> 
                                            
                        
                                        </tr>
                ';
                while($row = mysqli_fetch_array($result)) {
                    $output .= '
                    <table class="table" bordered="1">  
                                        <tr>  "
                                            <td>'.$row["Ma_Nhan_Vien"].'</td>  
                                            <td>'.$row["Ten_Nhan_Vien"].'</td>
                                            <td>'.$row["Ngay_Sinh"].'</td>
                                            <td>'.$row["Dia_Chi"].'</td>
                                            <td>'.$row["Email"].'</td>
                                            <td>'.$row["So_Dien_Thoai"].'</td>
                                            <td>'.$row["Gioi_Tinh"].'</td>
                                            <td>'.$row["Ma_Chuc_Vu"].'</td>
                                            <td>'.$row["Ma_Phong_Ban"].'</td>
                                            <td>'.$row["Luong_co_ban"].'</td>
                                        </tr>
                    ';
                }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=export-employee.xls');
            echo $output;
        }
    }
    

?>
