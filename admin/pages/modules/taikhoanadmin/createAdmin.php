<h3>Thêm mới thông tin admin</h3>
<?php 
    // create product
    if (isset($_POST['submitAdmin'])) {
        $id_admin = filter_input(INPUT_POST, "id_admin", FILTER_SANITIZE_SPECIAL_CHARS);
        $name_admin = filter_input(INPUT_POST, "name_admin", FILTER_SANITIZE_SPECIAL_CHARS);
        $username_admin = filter_input(INPUT_POST, "username_admin", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        $trangthai = $_POST['status'];
        
        
        if(empty($username_admin) || empty($password) || empty($name_admin)) {   
            echo "<script>alert('Sai hoặc thiếu thông tin vui lòng nhập lại!')</script>";
                
        }else {

            $sql = "INSERT INTO admin 
                            VALUES ('$id_admin', '$name_admin', '$username_admin', '$password', '$trangthai')";

            $result = $conn->query($sql);
            if ($result) {
                echo "<h2 align='center' style='background-color: lime;'>Thêm thành công</h2>";
                header('Location: index.php?quanly=admin'); 
            }else {
                echo "<h2 align='center' style='background-color: tomato;'>Thêm thất bại!</h2>" .$conn->connect_error;
            }
        }
    }
    ?>
        <form action="" method="post">
            <table class="table table-bordered" align="center" >
                <tr>
                    <td>Mã Admin</td>
                    <td>
                        <input type="text" name="id_admin" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Tên Admin</td>
                    <td>
                        <input type="text" name="name_admin" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Tên đăng nhập</td>
                    <td>
                        <input type="text" name="username_admin" class="wi40 mg8">
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
                        <select name="status" id="status" class="wi40 mg8">
                            <option value="1">Hoạt động</option>
                            <option value="0">Khóa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Thêm" name="submitAdmin" class="btn btn-primary minwidth80">
                        <input type="reset" value="Làm lại" name="resetBtn" class="btn btn-primary minwidth80">
                    </td>
                </tr>
            </table>
        </form>
