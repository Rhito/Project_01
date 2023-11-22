<?php
if (isset($_GET['editProduct'])) {
    $id = $_GET['editProduct'];
    $sql = "SELECT * FROM sanpham WHERE id_sanpham='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    $id_sanpham = $row['id_sanpham'];
    $ten_sanpham = $row['ten_sanpham'];
    $id_danhmuc = $row['id_danhmuc'];
    $soluong = $row['soluong'];
    $gia_sanpham = $row['gia_sanpham'];
    $gia_sanpham = $row['gia_sanpham'];
    $tinhtrang_sanpham = $row['tinhtrang_sanpham'];


    if (isset($_POST['submitBtn'])) {
        $id_sanpham = $_POST['id_sanpham'];
        $ten_sanpham = $_POST['ten_sanpham'];
        $id_danhmuc = $_POST['id_danhmuc'];
        $soluong = $_POST['soluong'];
        $gia_sanpham = $_POST['gia_sanpham'];
        $gia_sanpham = $_POST['gia_sanpham'];
        $tinhtrang_sanpham = $_POST['tinhtrang_sanpham'];

        // (id_sanpham, ten_sanpham, id_danhmuc, soluong, gia_sanpham, tinhtrang_sanpham)
        $edit = "UPDATE sanpham
                 SET id_sanpham='$id_sanpham', ten_sanpham='$ten_sanpham', id_danhmuc='$id_danhmuc',
                     soluong='$soluong', gia_sanpham='$gia_sanpham', tinhtrang_sanpham='$tinhtrang_sanpham' ";
        $resultEdit = $conn->query($edit);
        if ($resultEdit) {
            echo "<h2 align='center' style='background-color: lime;'>Sửa thành công</h2>
                    ";
        } else {
            echo "<h2 align='center' style='background-color: tomato;'>Thêm thất bại!</h2>" . $conn->connect_error;
        }
    }
}
?>
    <br>
    <h3>Sửa sản phẩm</h3>
    <br>
<form action="" method="post">
    <table class="table table-bordered" align="center">
        <tr>
            <td>Mã sản phẩm</td>
            <td>
                <input type="text" name="id_sanpham" value="<?php echo $id_sanpham;?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td>
                <input type="text" name="ten_sanpham" value="<?php echo $ten_sanpham;?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Mã danh mục</td>
            <td>
                <input type="text" name="id_danhmuc" value="<?php echo $id_danhmuc;?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td>
                <input type="text" name="soluong" value="<?php echo $soluong;?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td>
                <input type="text" name="gia_sanpham" value="<?php echo $gia_sanpham;?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <select name="tinhtrang_sanpham" id="tinhtrang_sanpham" class="wi40 mg8">
                    <option value="1" <?php if($tinhtrang_sanpham==1) echo'selected'; ?>>Kinh doanh </option>
                    <option value="0" <?php if($tinhtrang_sanpham==0) echo'selected'; ?>>Ngừng kinh doanh</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Thêm" name="submitBtn" class="btn btn-primary minwidth80">
                <input type="reset" value="Làm lại" name="resetBtn" class="btn btn-primary minwidth80">
            </td>
        </tr>
    </table>
</form>