<h3>Thêm mới sản phẩm</h3>
<?php 

    // create product
    if (isset($_POST['submitBtn1'])) {
        $id_sanpham = $_POST['id_sanpham'];

        $anh_sanpham = $_FILES['anh_sanpham']['name'];
        $anh_sanpham_tmp = $_FILES['anh_sanpham']['tmp_name'];
        $anh_sanpham = time().'_'.$anh_sanpham;
        
        $mau_sanpham = $_FILES['mau_sanpham']['name'];
        $mau_sanpham_tmp = $_FILES['mau_sanpham']['tmp_name'];
        $mau_sanpham = time().'_'.$mau_sanpham;
        
        $ten_sanpham = $_POST['ten_sanpham'];
        $id_danhmuc = $_POST['id_danhmuc'];
        $soluong = $_POST['soluong'];
        $gia_sanpham = $_POST['gia_sanpham'];
        $tinhtrang_sanpham = $_POST['tinhtrang_sanpham'];
        $noidung_sanpham = $_POST['noidung_sanpham'];
        
        if (!empty($id_sanpham) && !empty($anh_sanpham) && !empty($mau_sanpham) && !empty($ten_sanpham) &&
            !empty($gia_sanpham) && !empty($id_danhmuc) && !empty($soluong)){

            move_uploaded_file($anh_sanpham_tmp, 'uploads/' . $anh_sanpham);
            move_uploaded_file($mau_sanpham_tmp, 'uploads/'.$mau_sanpham);
            
            $sql = "INSERT INTO sanpham VALUES ('$id_sanpham', '$anh_sanpham', '$mau_sanpham', '$ten_sanpham'
                                                , '$id_danhmuc', '$soluong', '$gia_sanpham', '$tinhtrang_sanpham'
                                                , '$noidung_sanpham')";
            $result = $conn->query($sql);
            if ($result) {
                echo "<h2 align='center' style='background-color: lime;'>Thêm thành công</h2>";
                header('Location: index.php?quanly=sanpham'); 
            }else {
                echo "<h2 align='center' style='background-color: tomato;'>Thêm thất bại!</h2>" .$conn->connect_error;
            }
        }else {
            echo "<h2 align='center' style='background-color: tomato;'>Vui lòng nhập đủ thông tin!!</h2>";
        }
        
        }
    ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered" align="center" >
                <tr>
                    <td>Mã sản phẩm</td>
                    <td>
                        <input type="text" name="id_sanpham" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh sản phẩm</td>
                    <td>
                        <input type="file" name="anh_sanpham" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Màu sản phẩm</td>
                    <td>
                        <input type="file" name="mau_sanpham" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                        <input type="text" name="ten_sanpham" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Mã danh mục</td>
                    <td>
                        <select name="id_danhmuc" class="wi40 mg8">
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="3">Bé trai</option>
                            <option value="4">Bé gái</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="text" name="soluong" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td>
                        <input type="text" name="gia_sanpham" class="wi40 mg8">
                    </td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <select name="tinhtrang_sanpham" id="tinhtrang_sanpham" class="wi40 mg8">
                            <option value="1">Kinh doanh </option>
                            <option value="0">Ngừng kinh doanh</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nội dung sản phẩm</td>
                    <td>
                       <textarea name="noidung_sanpham" class="wi40" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Thêm" name="submitBtn1" class="btn btn-primary minwidth80">
                        <input type="reset" value="Làm lại" name="resetBtn" class="btn btn-primary minwidth80">
                    </td>
                </tr>
            </table>
        </form>
