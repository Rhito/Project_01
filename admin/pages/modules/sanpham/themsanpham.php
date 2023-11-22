<h3>Thêm mới sản phẩm</h3>
<?php 
    // create product
            if (isset($_POST['submitBtn'])) {
                $id_sanpham = $_POST['id_sanpham'];
                $ten_sanpham = $_POST['ten_sanpham'];
                $id_danhmuc = $_POST['id_danhmuc'];
                $soluong = $_POST['soluong'];
                $gia_sanpham = $_POST['gia_sanpham'];
                $tinhtrang_sanpham = $_POST['tinhtrang_sanpham'];
                
                $sql = "INSERT INTO sanpham VALUES ('$id_sanpham','$ten_sanpham', '$id_danhmuc', '$soluong', '$gia_sanpham', $tinhtrang_sanpham)";
                $result = $conn->query($sql);
                if ($result) {
                    echo "<h2 align='center' style='background-color: lime;'>Thêm thành công</h2>
                    ";
                    
                }else {
                    echo "<h2 align='center' style='background-color: tomato;'>Thêm thất bại!</h2>" .$conn->connect_error;
                }
            }
        ?>
        <form action="" method="post">
            <table class="table table-bordered" align="center">
                <tr>
                    <td>Mã sản phẩm</td>
                    <td>
                        <input type="text" name="id_sanpham" class="wi40 mg8">
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
                        <input type="text" name="id_danhmuc" class="wi40 mg8">
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
                    <td></td>
                    <td>
                        <input type="submit" value="Thêm" name="submitBtn" class="btn btn-primary minwidth80">
                        <input type="reset" value="Làm lại" name="resetBtn" class="btn btn-primary minwidth80">
                    </td>
                </tr>
            </table>
        </form>
