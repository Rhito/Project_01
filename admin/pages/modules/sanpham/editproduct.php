<?php
if (isset($_GET['editProduct'])) {
    $id = $_GET['editProduct'];
    $sql = "SELECT * FROM sanpham WHERE id_sanpham='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    $id_sanpham = $row['id_sanpham'];
    $anh_sanpham = $row['anh_sanpham'];
    $mau_sanpham = $row['mau_sanpham'];
    $ten_sanpham = $row['ten_sanpham'];
    $id_danhmuc = $row['id_danhmuc'];
    $soluong = $row['soluong'];
    $gia_sanpham = $row['gia_sanpham'];
    $gia_sanpham = $row['gia_sanpham'];
    $tinhtrang_sanpham = $row['tinhtrang_sanpham'];
    $noidung_sanpham = $row['noidung_sanpham'];

    if (isset($_POST['submitBtn'])) {
        $id_sanpham = $_POST['id_sanpham'];
        $anh_sanpham = $_FILES['anh_sanpham']['name'];
       
        if($anh_sanpham == ""){
            $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id'";
            $result = $conn->query($sql);
            $anh_sanpham =  $row['anh_sanpham'];
        }else {
            $anh_sanpham_tmp = $_FILES['anh_sanpham']['tmp_name'];
            $anh_sanpham = time().'_'.$anh_sanpham;
            move_uploaded_file($anh_sanpham_tmp, 'uploads/'.$anh_sanpham);
            $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id'";
            $result = $conn->query($sql);
            while($row = $result->fetch_array()){
                unlink("./uploads/{$row['anh_sanpham']}");
            }
        }

        $mau_sanpham = $_FILES['mau_sanpham']['name'];
        if($mau_sanpham == ""){
            $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id'";
            $result = $conn->query($sql);
            $mau_sanpham =  $row['mau_sanpham'];
        }else {
            $mau_sanpham_tmp = $_FILES['mau_sanpham']['tmp_name'];
            $mau_sanpham = time().'_'.$mau_sanpham;
            move_uploaded_file($mau_sanpham_tmp, 'uploads/'.$mau_sanpham);
            $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id'";
            $result = $conn->query($sql);
            while($row = $result->fetch_array()){
                unlink("./uploads/{$row['mau_sanpham']}");
            }
        }

        $ten_sanpham = $_POST['ten_sanpham'];
        $id_danhmuc = $_POST['id_danhmuc'];
        $soluong = $_POST['soluong'];
        $gia_sanpham = $_POST['gia_sanpham'];
        $gia_sanpham = $_POST['gia_sanpham'];
        $tinhtrang_sanpham = $_POST['tinhtrang_sanpham'];
        $noidung_sanpham = $_POST['noidung_sanpham'];

        $edit = "UPDATE sanpham
                 SET id_sanpham='$id_sanpham', anh_sanpham='$anh_sanpham', mau_sanpham='$mau_sanpham',
                     ten_sanpham='$ten_sanpham', id_danhmuc='$id_danhmuc',soluong='$soluong',
                     gia_sanpham='$gia_sanpham', tinhtrang_sanpham='$tinhtrang_sanpham',
                     noidung_sanpham='$noidung_sanpham' WHERE id_sanpham='$id' ";
        $resultEdit = $conn->query($edit);
        if ($resultEdit) {
            echo "<h2 align='center' style='background-color: lime;'>Sửa thành công</h2>";
            header('Location: index.php?quanly=sanpham');
        } else {
            echo "<h2 align='center' style='background-color: tomato;'>Thêm thất bại!</h2>" . $conn->connect_error;
        }
    }
}
?>
    <br>
    <h3>Sửa sản phẩm</h3>
    <br>
<form action="" method="post" enctype="multipart/form-data">
    <table class="table table-bordered" align="center">
        <tr>
            <td>Mã sản phẩm</td>
            <td>
                <input type="text" name="id_sanpham" value="<?php echo $id_sanpham;?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm</td>
            <td>
                <input type="file" name="anh_sanpham" value="<?php echo $anh_sanpham;?>" class="wi40 mg8">
                <img src="./uploads/<?php echo $anh_sanpham;?>" alt="" width="150px">
            </td>
        </tr>
        <tr>
            <td>Màu sản phẩm</td>
            <td>
                <input type="file" name="mau_sanpham" value="<?php echo $mau_sanpham;?>" class="wi40 mg8">
                <img src="./uploads/<?php echo $mau_sanpham;?>" alt="" width="60px">
            </td>
            
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td>
                <input type="text" name="ten_sanpham" value="<?php echo $ten_sanpham;?>" class="wi40 mg8">
            </td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="id_danhmuc" class="wi40 mg8">
                    <option value="1" <?php if($id_danhmuc==1) echo 'selected'; ?>>Nam</option>
                    <option value="2" <?php if($id_danhmuc==2) echo 'selected'; ?>>Nữ</option>
                    <option value="3" <?php if($id_danhmuc==3) echo 'selected'; ?>>Bé trai</option>
                    <option value="4" <?php if($id_danhmuc==4) echo 'selected'; ?>>Bé gái</option>
                </select>
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
            <td>Nội dung sản phẩm</td>
            <td>
                <input type="text" name="noidung_sanpham" value="<?php echo $noidung_sanpham;?>" class="wi40 mg8">
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