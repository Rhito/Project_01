<?php
if (isset($_GET['editAdmin'])) {
    $id = $_GET['editAdmin'];
    $sql = "SELECT * FROM admin WHERE id_admin='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    $id_admin = $row['id_admin'];
    $name_admin = $row['name_admin'];
    $username_admin = $row['username_admin'];
    $password = $row['password'];
    $status = $row['status'];


    if (isset($_POST['submitBtn'])) {
        $id_admin = filter_input(INPUT_POST, "id_admin", FILTER_SANITIZE_SPECIAL_CHARS);
        $name_admin = filter_input(INPUT_POST, "name_admin", FILTER_SANITIZE_SPECIAL_CHARS);
        $username_admin = filter_input(INPUT_POST, "username_admin", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        $status = $_POST['status'];

        if (empty($username_admin) || empty($password) || empty($name_admin)) {
            echo "<script>alert('Sai hoặc thiếu thông tin vui lòng nhập lại!')</script>";
        } else {

            $edit = "UPDATE admin
            SET id_admin='$id_admin', name_admin='$name_admin', username_admin='$username_admin',
                password='$password', status='$status'
                WHERE id_admin='$id' ";

            $resultEdit = $conn->query($edit);

            if ($resultEdit) {
                echo "<h2 align='center' style='background-color: lime;'>Sửa thành công</h2>";
                header('Location: index.php?quanly=admin');
            } else {
                echo "<h2 align='center' style='background-color: tomato;'>Thêm thất bại!</h2>" . $conn->connect_error;
            }
        }
    }
}
?>
<br>
<h3>Sửa thông tin admin</h3>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <table class="table table-bordered" align="center">
        <tr>
            <td>Mã Admin</td>
            <td>
                <input type="text" name="id_admin" value="<?php echo $id_admin; ?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Tên Admin</td>
            <td>
                <input type="text" name="name_admin" value="<?php echo $name_admin; ?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td>
                <input type="text" name="username_admin" value="<?php echo $username_admin; ?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td>
                <input type="text" name="password" value="<?php echo $password; ?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <select name="status" id="status" class="wi40 mg8">
                    <option value="1" <?php if ($status == 1) echo 'selected'; ?>>Hoạt động</option>
                    <option value="0" <?php if ($status == 0) echo 'selected'; ?>>Khóa</option>
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