<?php
if (isset($_GET['editUser'])) {
    $id = $_GET['editUser'];
    $sql = "SELECT * FROM khachhang WHERE id_khachhang='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    $full_name = $row['ten_khachhang'];
    $age = $row['tuoi_khachhang'];
    $gender = $row['gioitinh'];
    $address = $row['diachi'];
    $phone = $row['sodienthoai'];
    $email = $row['email'];
    $username = $row['tendangnhap'];
    $password = $row['matkhau'];
    $trangthai = $row['trangthai'];

    if (isset($_POST['submitBtn'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $full_name = filter_input(INPUT_POST, "full_name", FILTER_SANITIZE_SPECIAL_CHARS);

        $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
        if ($age <= 6 || $age >= 150) $age = '';

        $gender = $_POST['gender'];
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
        $lengthPhone = strlen($phone);
        if (strlen($phone) != 10) $phone = "";
        $trangthai = $_POST['trangthai'];

        if (empty($username) || empty($password) || empty($full_name) || empty($age) || empty($address) || empty($email) || empty($phone)) {
            echo "<script>alert('Sai hoặc thiếu thông tin vui lòng nhập lại!')</script>";
            if(strlen($phone) != "") {
                echo "<script>alert('Số điện thoại phải là 10 chữ số <{$lengthPhone}>')</script>";
            }
            $phone = $row['sodienthoai'];
        }else {

            $edit = "UPDATE khachhang
            SET ten_khachhang='$full_name', tuoi_khachhang='$age', gioitinh='$gender',
                diachi='$address', sodienthoai='$phone',email='$email',
                tendangnhap='$username', matkhau='$password'
                WHERE id_khachhang='$id' ";

            $resultEdit = $conn->query($edit);

            if ($resultEdit) {
                echo "<h2 align='center' style='background-color: lime;'>Sửa thành công</h2>";
                header('Location: index.php?quanly=user');
            } else {
                echo "<h2 align='center' style='background-color: tomato;'>Thêm thất bại!</h2>" . $conn->connect_error;
            }
        }
    }
}
?>
<br>
<h3>Sửa thông tin khách hàng</h3>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <table class="table table-bordered" align="center">
        <tr>
            <td>Tên khách hàng</td>
            <td>
                <input type="text" value="<?php echo $full_name; ?>" name="full_name" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Tuổi</td>
            <td>
                <input type="number" value="<?php echo $age; ?>" name="age" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Giới Tính</td>
            <td>
                <select name="gender" class="wi40 mg8">
                    <option value="1" <?php if ($gender == 1) echo 'selected'; ?>>Nam</option>
                    <option value="0" <?php if ($gender == 0) echo 'selected'; ?>>Nữ</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input type="text" value="<?php echo $address; ?>" name="address" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td>
                <input type="number" value="<?php echo $phone; ?>" name="phone" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" value="<?php echo $email; ?>" name="email" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td>
                <input type="text" value="<?php echo $username; ?>" name="username" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td>
                <input type="text" value="<?php echo $password; ?>" name="password" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <select name="trangthai" id="trangthai" class="wi40 mg8">
                    <option value="1" <?php if ($trangthai == 1) echo 'selected'; ?>>Hoạt động</option>
                    <option value="0" <?php if ($trangthai == 0) echo 'selected'; ?>>Khóa</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Sửa" name="submitBtn" class="btn btn-primary minwidth80">
                <input type="reset" value="Làm lại" name="resetBtn" class="btn btn-primary minwidth80">
            </td>
        </tr>
    </table>
</form>