<h3>Thêm mới sản phẩm</h3>
<?php 
    // create product
    if (isset($_POST['submitUser'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $full_name = filter_input(INPUT_POST, "full_name", FILTER_SANITIZE_SPECIAL_CHARS);

        $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
        if($age <= 6 || $age >= 150 ) $age = '';

        $gender = $_POST['gender'];
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
        if(strlen($phone) != 10) $phone ="";
        $trangthai = $_POST['trangthai'];
        // $ten_khachhang = $_POST['ten_khachhang'];
        // $tuoi_khachhang = $_POST['tuoi_khachhang'];
        // $gioitinh = $_POST['gioitinh'];
        // $diachi = $_POST['diachi'];
        // $sodienthoai = $_POST['sodienthoai'];
        // $email = $_POST['email'];
        // $tendangnhap = $_POST['tendangnhap'];
        // $matkhau = $_POST['matkhau'];
        // $gia_sanpham = $_POST['gia_sanpham'];
        // $trangthai = $_POST['trangthai'];
        
        if(empty($username) || empty($password) || empty($full_name) || empty($age) || 
            empty($address) || empty($email) || empty($phone)) {

                
                    echo "<script>alert('Sai hoặc thiếu thông tin vui lòng nhập lại!')</script>";
                    if($phone != '') {
                        echo "<script>alert('Số điện thoại phải là 10 chữ số vui lòng nhập lại!')</script>";
                    }
                
        }else {

            $sql = "INSERT INTO khachhang(ten_khachhang, tuoi_khachhang, gioitinh, diachi, sodienthoai,
                                                email, tendangnhap, matkhau) 
                            VALUES ('$full_name','$age', '$gender', '$address', '$phone',
                                    '$email','$username','$password')";

            $result = $conn->query($sql);
            if ($result) {
                echo "<h2 align='center' style='background-color: lime;'>Thêm thành công</h2>";
                // header('Location: index.php?quanly=user'); 
            }else {
                echo "<h2 align='center' style='background-color: tomato;'>Thêm thất bại!</h2>" .$conn->connect_error;
            }
        }
    }
    ?>
        <form action="" method="post">
            <table class="table table-bordered" align="center" >
                <tr>
                    <td>Tên khách hàng</td>
                    <td>
                        <input type="text" name="full_name" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Tuổi</td>
                    <td>
                        <input type="number" name="age" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Giới Tính</td>
                    <td>
                        <select name="gender" class="wi40 mg8">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="address" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="number" name="phone" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Tên đăng nhập</td>
                    <td>
                        <input type="text" name="username" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="text" name="password" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <select name="trangthai" id="trangthai" class="wi40 mg8">
                            <option value="1">Hoạt động</option>
                            <option value="0">Khóa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Thêm" name="submitUser" class="btn btn-primary minwidth80">
                        <input type="reset" value="Làm lại" name="resetBtn" class="btn btn-primary minwidth80">
                    </td>
                </tr>
            </table>
        </form>
